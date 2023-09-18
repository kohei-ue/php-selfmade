<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanMakeRequest extends FormRequest
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
            'body' => 'required',
            'area' => 'required|not_in:選択してください',
            'date' => 'required|not_in:選択してください',
            'money' => 'required|not_in:選択してください',
            'traffic' => 'required|not_in:選択してください',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'この入力フォームは必須です。',
            'body.required' => 'この入力フォームは必須です。',
            'area.required' => 'エリアが選択されていません。',
            'date.required' => '滞在日数が選択されていません。',
            'money.required' => '予算が選択されていません。',
            'traffic.required' => '主な移動手段が選択されていません。',
            'area.not_in' => 'エリアが選択されていません。',
            'date.not_in' => '滞在日数が選択されていません。',
            'money.not_in' => '予算が選択されていません。',
            'traffic.not_in' => '主な移動手段が選択されていません。',
            'image.mimes' => '写真の形式が指定と異なります。',
            'image.max' => '写真のサイズが指定を超えています。',
        ];
    }
}
