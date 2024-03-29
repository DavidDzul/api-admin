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
    public function index()
    {

        $assets = Asset::with('user')->get();
        // $assets = Asset::all();
        // return response()->json($assets);
        return response()->json([
            'res' => true,
            'assets' => $assets,
        ], 200);
    }

    public function store(SaveAssetRequest $request)
    {
        $year = number_format(date('y'));
        $code = Helper::IDGenerator(new Asset, 'controlNumber', 3, 'ACT-' . $year,);
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
        $asset->id_user = $request->userId;
        $asset->observation = $request->observation;
        // $asset->campus = $request->campus;
        // $asset->personCharge = $request->personCharge;
        // $asset->personPosition = $request->personPosition;
        $asset->save();
        // Asset::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Activo agregado con éxito',
        ], 200);
    }


    public function show($id)
    {
        $asset = Asset::with('images')->with('user')->with('files')->get()->find($id);
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
        $asset->id_user = $request->userId;
        $asset->observation = $request->observation;
        // $asset->campus = $request->campus;
        // $asset->personCharge = $request->personCharge;
        // $asset->personPosition = $request->personPosition;
        $asset->save();
        return response()->json([
            'res' => true,
            "msg" => "Actualización con  éxito",
        ], 200);
    }


    public function destroy($id)
    {
        $asset = Asset::find($id);
        if ($asset) {
            $asset->delete();
            return response()->json([
                'res' => true,
                "msg" => "Eliminado con  éxito",
            ], 200);
        } else {
            return response()->json([
                'res' => true,
                "msg" => "Error al eliminar",
            ], 200);
        }
    }
}