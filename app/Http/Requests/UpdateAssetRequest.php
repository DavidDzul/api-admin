<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "acquisitionDate" => "required",
            "providerName" => "required",
            "invoiceNumber" => "required",
            "assetype" => "required",
            "companyBrand" => "required",
            "model" => "required",
            "description" => "required",
            "serialNumber" => "required",
            "AcquisitionValue" => "required",
            "state" => "required",
            "location" => "required",
            "use" => "required",
            // "campus" => "required",
            // "personCharge" => "required",
            // "personPosition" => "required",
        ];
    }
}
