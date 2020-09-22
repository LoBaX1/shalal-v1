<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliverRequest extends FormRequest
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
            'status' => 'string | nullable'  ,
        ];
    }

    public function messages()
    {
        return [
            'status.string'=>'هذا الحقل يجب أن يكون نصي.',
        ];
    }
}
