<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => '用户名是必填项。',
            'username.unique' => '用户名已存在。',
            'password.required' => '密码是必填项。',
            'password.min' => '密码长度至少为 8 个字符。',
            'password.confirmed' => '密码确认不匹配。',
        ];
    }
}
