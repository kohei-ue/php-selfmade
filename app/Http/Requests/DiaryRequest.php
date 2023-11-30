<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image1' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'この入力フォームは必須です。',
            'start_date.required' => '開始日が選択されていません。',
            'end_date.required' => '終了日が選択されていません。',
            'end_date.after_or_equal' => '終了日は開始日以降の日付を選択してください。',
            'image1.mimes' => '写真1のフォーマットが無効です。',
            'image1.max' => '写真1のサイズが大きすぎます。',
            'image2.mimes' => '写真2のフォーマットが無効です。',
            'image2.max' => '写真2のサイズが大きすぎます。'
        ];
    }
}
