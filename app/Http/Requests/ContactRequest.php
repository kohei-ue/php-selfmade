<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|max:10',
            'tel' => 'nullable|digits:11',
            'email' => 'required|email',
            'body' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'ユーザー名は必須入力です。',
            'tel.digits' => '0～9の数字で入力してください。',
            'email.required' => 'メールアドレスは必須入力です。',
            'email.email' => '正しいメールアドレスを入力してください。',
            'body.required' => 'お問い合わせ内容は必須入力です。'
        ];
    }
}
