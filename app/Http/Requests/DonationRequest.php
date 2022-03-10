<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
            'type' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'type.required' => 'Donation Type is required',
            'description.required' => 'Description is required',
            'quantity.required' => 'Quantity is required',
        ];
    }
}
