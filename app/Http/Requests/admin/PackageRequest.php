<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'package_amount' => 'required',
            'package_duration' => 'integer|required',
            'package_roi' => 'integer|required',
            'package_name' => 'required',
            'package_description' => 'required',
            'package_brochure' => 'mimes:pdf|max:2048',
            'package_image' => 'mimes:jpg,png,jpeg|max:2048'
        ];
    }
}
