<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ten_bviet' => 'required|max:255',
            'ma_tgia' => 'required|max:255',
            'ma_tloai' => 'required|max:255',
            'hinhanh' => ['nullable', 'mimes:jpg,jpeg,png'],
        ];
    }
}