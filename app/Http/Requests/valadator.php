<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class valadator extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            "countity"=>'required|integer',
            "remark"=>'nullable',
            "unite"=>"required",
            "depot_id"=>"required",
            "catagory_id"=>"required",
            "invoce_number"=>"required",
        ];
    }
}
