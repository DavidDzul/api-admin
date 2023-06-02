<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAssetRequest;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Image;
use App\Helpers\Helper;
use App\Http\Requests\UpdateAssetRequest;

class AssetController extends Controller
{
    public function index(){

        $assets = Asset::with('images')->get();
        // $assets = Asset::all();
        return response()->json($assets);

    }

    public function store(SaveAssetRequest $request){   
        $sede = $request->campus;
        $year = number_format(date('y'));
        $code = Helper::IDGenerator(new Asset, 'controlNumber', 3, 'A'.substr($request->campus, 0, 1).$year, $sede);
        $asset = new Asset;
        $asset->controlNumber = $code;
        $asset->acquisitionDate = $request->acquisitionDate;
        $asset->providerName = $request->providerName;
        $asset->invoiceNumber = $request->invoiceNumber;
        $asset->assetype = $request->assetype;
        $asset->companyBrand = $request->companyBrand;
        $asset->model = $request->model;
        $asset->description = $request->description;
        $asset->serialNumber = $request->serialNumber;
        $asset->AcquisitionValue = $request->AcquisitionValue;
        $asset->state = $request->state;
        $asset->location = $request->location;
        $asset->otherUse = $request->otherUse;
        $asset->campus = $request->campus;
        $asset->personCharge = $request->personCharge;
        $asset->personPosition = $request->personPosition;
        $asset->save();
        // Asset::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Activo agregado con éxito',
        ], 200);
    }


    public function show($id)
    {   
        $asset = Asset::with('images')->get()->find($id);
        return response()->json([
            'res' => true,
            'asset' => $asset,
        ], 200);
    }


    public function update(UpdateAssetRequest $request)
    {
        $asset = Asset::find($request->id);
        $asset->acquisitionDate = $request->acquisitionDate;
        $asset->providerName = $request->providerName;
        $asset->invoiceNumber = $request->invoiceNumber;
        $asset->assetype = $request->assetype;
        $asset->companyBrand = $request->companyBrand;
        $asset->model = $request->model;
        $asset->description = $request->description;
        $asset->serialNumber = $request->serialNumber;
        $asset->AcquisitionValue = $request->AcquisitionValue;
        $asset->state = $request->state;
        $asset->location = $request->location;
        $asset->otherUse = $request->otherUse;
        $asset->campus = $request->campus;
        $asset->personCharge = $request->personCharge;
        $asset->personPosition = $request->personPosition;
        $asset->save();
        return response()->json([
            'res' => true,
            "msg" => "Actualización con  éxito",
        ], 200);
    }


    public function destroy($id)
    {
        $asset = Asset::find($id);
        if($asset){
            $asset->delete();
            return response()->json([
                'res' => true,
                "msg" => "Eliminado con  éxito",
            ], 200);
        }else{
            return response()->json([
                'res' => true,
                "msg" => "Error al eliminar",
            ], 200);
        }
        
    }

    
}