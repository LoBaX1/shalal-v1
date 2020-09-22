<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
            'name' => 'required | max:100|string' ,
            'phone' => 'required | max:100 |unique:agents' ,
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب.',
            'name.string'=>'هذا الحقل يجب أن يكون نصي.',
            'name.max'=>'إسم المندوب يجب أن يكون اصغر من 100 حرف.',
            'phone.max' => 'رقم الهاتف يجب أن يكون اصغر من 100 حرف. ',
            'phone.unique' => 'رقم الهاتف موجود مسبقا اختر واحد جديد.',
        ];
    }
}
