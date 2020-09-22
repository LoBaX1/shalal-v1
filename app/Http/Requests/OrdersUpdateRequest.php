<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersUpdateRequest extends FormRequest
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
            'tank_capacity' => ['numeric']  ,
            'price' => ['numeric' ],
            'text' => 'max:100 |string' ,
        ];
    }

    public function messages()
    {
        return [

            'numeric' => 'هذا الحقل يجب ان يكون رقمي',
            'text.string'=>'هذا الحقل يجب أن يكون نصي.',
        ];
    }
}
