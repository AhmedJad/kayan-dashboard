<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientGroupRequest extends FormRequest
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
            "id" => "required",
            "name" => "required|unique:client_groups,name," . $this->id,
            "clients_ids" => "required|array|min:1",
            "clients_ids.*" => "required|numeric",
            "clients_ids.*" => "required|numeric",
        ];
    }
}
