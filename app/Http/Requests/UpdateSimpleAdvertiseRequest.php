<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSimpleAdvertiseRequest extends FormRequest
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
        $rules = [
            "id" => "required",
            "title" => "required",
            "image" => "nullable|image",
            "external" => "required|in:true,false"
        ];
        if ($this->external=="true") {
            $rules["url"] = "required";
        } else {
            $rules["product_id"] = "required";
        }
        return $rules;
    }
}
