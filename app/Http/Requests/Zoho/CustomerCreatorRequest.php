<?php

namespace App\Http\Requests\Zoho;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreatorRequest extends FormRequest
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
            'display_name' => 'string|required',
            'salutation' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => 'required|email',
            'company_name' => 'string',
            'phone' => 'string',
            'mobile' => 'string',
            'department' => 'string',
            'designation' => 'string',
            'custom_fields' => 'sometimes|array',
            'custom_fields.*.label' => 'sometimes|required|string',
            'custom_fields.*.value' => 'sometimes|required|string',
        ];
    }
}
