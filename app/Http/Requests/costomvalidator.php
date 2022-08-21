<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class costomvalidator extends FormRequest
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
        dd(request()->all());
        return [

            "catagory" => ["required"],
            "remark" => ["required"],
            "invoice_number" => ["required"]
        ];
    }
}
