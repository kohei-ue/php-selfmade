<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'message' => 'required|string|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'コメントの入力は必須です。',
            'message.string' => '開始日が選択されていません。',
            'message.' => '終了日が選択されていません。'
        ];
    }
}
