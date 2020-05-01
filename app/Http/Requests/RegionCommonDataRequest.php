<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionCommonDataRequest extends FormRequest
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
            'date' => 'required|date',
            'infected' => 'required|numeric',
            'recovered' => 'required|numeric',
            'dead' => 'required|numeric',
            'tested' => 'required|numeric',
            'isolated' => 'required|numeric',
        ];
    }
}
