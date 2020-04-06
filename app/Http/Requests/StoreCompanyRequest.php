<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
                'name'         =>    'required|string|min:3',
                'email'        =>    'required|email',
                'logo'         =>    'required|image|dimensions:min_width=60,min_height=100|max:2048',
                'website'      =>    'required|url',
        ];

    }
}
