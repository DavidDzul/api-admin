<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        
        $image = new Image();
        $request->validate([
            'id_asset'=>'required',
            'url'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // $data = null;
        // if($request->hasFile('url')){
        //     $name = $request->file('url')->store('public/images');
        //     $data = Storage::url($name);
        // }
        // $images->id_asset = $request->id_asset;
        // $images->url = $data;
        // $result= $images->save();
        $name = null;
        if($request->hasFile('url')){
            $name = $request->file('url')->store('images','public');
        }

        $image->id_asset = $request->id_asset;
        $image->url = $name;
        $result= $image->save();
        
        if($result){
            return response()->json([
                'res' => true,
                "msg" => "Agregado con éxito",
                "image" => $image
            ], 200);
        }else{
            return response()->json([
                'res' => true,
                "msg" => "Error al agregar",
            ], 200);
        }
    }

    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        $destination = public_path("storage\\".$image->url);

        if(File::exists($destination)){
            File::delete($destination);
        }
        $result = $image->delete();
        if($result){
            return response()->json([
                'res' => true,
                "msg" => "Eliminado con éxito",
                "image" => $image
            ], 200);
        }else{
            return response()->json([
                'res' => true,
                "msg" => "Error al eliminar",
            ], 200);
        }
    }
}