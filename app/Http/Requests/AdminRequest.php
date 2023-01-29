<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'email' =>  ['required','email',Rule::unique('admins','email')->ignore($this->id)],
            'phone' =>  ['required','min:6',Rule::unique('admins','phone')->ignore($this->id)],
            'role_id'=>'required|numeric',
            'password'=>'min:6|nullable',

        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'الايميل مطلوب',
            'email.email'=>'الايميل غير صحيح',
            'email.unique'=>'الايميل مستخدم',
            'phone.required'=>'الهاتف مطلوب',
            'phone.email'=>'الهاتف غير صحيح',
            'phone.unique'=>'الهاتف مستخدم',
            'role_id.required'=>'الصلاحية مطلوب',
            'password.min'=>'كلمة المرور يجب ان يكون على الاقل 6 احرف ',

        ];
    }
}
