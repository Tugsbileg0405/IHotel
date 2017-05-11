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
            'lastname' => 'required',
            'country' => 'required',
            'phone_number' => 'nullable',
            'card_number' => 'required|numeric',
            'card_holders_name' => 'required',
            'expired_month' => 'required|numeric|digits:2',
            'expired_year' => 'required|numeric|digits:2',
            'cvc' => 'required|numeric|digits:3',
            'request' => 'nullable',
        ];
    }
}
