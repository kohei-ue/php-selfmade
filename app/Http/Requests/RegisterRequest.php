<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_conf' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'ユーザー名は必須入力です。',
            'email.required' => 'IDは必須入力です。',
            'email.email' => 'emailの形式で入力してください。',
            'email.unique' => '入力されたメールアドレスはすでに登録されています。',
            'password.required' => 'パスワードは必須入力です。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password_conf.required' => 'この項目は必須入力です。',
            'password_conf.same' => 'パスワードが確認用と一致していません。',
        ];
    }
}
