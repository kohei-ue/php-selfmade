<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            // 入力されたメールアドレスがusersテーブルのemailカラムに存在することを確認
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'IDは必須入力です。',
            'email.email' => 'emailの形式で入力してください。',
            'email.exists' => 'このメールアドレスは登録されていません。',
            'password.required' => 'パスワードは必須入力です。',
        ];
    }
}