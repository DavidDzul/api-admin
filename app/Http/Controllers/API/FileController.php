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
            'url' => 'required|mimes:pdf,docx|max:2048'
        ]);
        $name = null;
        if ($request->hasFile('url')) {
            $name = $request->file('url')->store('files', 'public');
        }

        $file->id_asset = $request->id_asset;
        $file->url = $name;
        $file->save();
        return response()->json([
            'res' => true,
            "msg" => "Agregado con éxito",
            "file" => $file
        ], 200);
    }
}
