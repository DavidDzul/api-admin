<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function createFile(Request $request)
    {

        $file = new File();
        $request->validate([
            'id_asset' => 'required',
            'url' => 'required|mimes:pdf,docx,xlsx|max:2048'
        ]);
        $url = null;
        $name = null;
        if ($request->hasFile('url')) {
            $url = $request->file('url')->store('files', 'public');
            $name = $request->file('url')->getClientOriginalName();
        }

        $file->id_asset = $request->id_asset;
        $file->url = $url;
        $file->name = $name;
        $file->save();
        return response()->json([
            'res' => true,
            "msg" => "Agregado con éxito",
            "file" => $file
        ], 200);
    }
}
