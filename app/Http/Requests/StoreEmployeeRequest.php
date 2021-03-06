<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|between:1,255',
            'last_name' => 'required|string|between:1,255',
            'date_of_birth' => 'integer|min:0',
            'weight' => 'nullable|integer|between:0,65535',
            'height' => 'nullable|string|regex:/^\d+\'\d{1,2}(\.\d+)?\"$/is|max:255',
            'salary' => 'nullable|integer|min:0',
            'position' => 'nullable|string|between:1,255'
        ];
    }
}
