<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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

    public function rules()
    {
        return [
            'tank_capacity' => ['required ','numeric']  ,
            'price' => ['required','numeric' ],
            'text' => 'max:100 |string' ,
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب.',
            'numeric' => 'هذا الحقل يجب ان يكون رقمي',
            'text.string'=>'هذا الحقل يجب أن يكون نصي.',
        ];
    }
}
