<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest
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
            'email' => 'required | email|max:100|unique:admins' ,
            'password' => 'required | max:100' ,
            'phone' => 'required | max:100' ,
            'permissions' => 'required | in:1,0' ,
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب.',
            'name.string'=>'هذا الحقل يجب أن يكون نصي.',
            'name.max'=>'إسم المستخدم يجب أن يكون اصغر من 100 حرف.',
            'email.email' => 'البريد الإلكتروني المدخل غير صحيح.',
            'email.max' => 'البريد الإلكتروني يجب أن يكون اصغر من 100 حرف.',
            'email.unique' => 'البريد الإلكتروني موجود مسبقا اختر واحد جديد.',
            'phone.max' => 'رقم الهاتف يجب أن يكون اصغر من 100 حرف. ',
            'permissions.in' => 'القمية غير صحيحة .',
        ];
    }
}
