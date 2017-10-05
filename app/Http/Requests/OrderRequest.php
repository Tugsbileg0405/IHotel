<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'country' => 'required',
            'phone_number' => 'required',
            'card_number' => 'nullable|numeric',
            'card_holders_name' => 'nullable',
            'expired_month' => 'nullable|numeric|digits:2',
            'expired_year' => 'nullable|numeric|digits:2',
            'cvc' => 'nullable|numeric',
            'request' => 'nullable',
        ];
    }
}
