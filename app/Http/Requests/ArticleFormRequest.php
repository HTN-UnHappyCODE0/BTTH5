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
            'tomtat1' => ['required'],
            'ten_bhat1' => ['required'],
            'hinhanh1' => ['mimes:jpg,jpeg,png'],
            'noidung1' => ['required'],

            'tieude1' => ['required'],
            'ma_tgia1' => ['required'],
            'ma_tloai1' => ['required'],
            'ngayviet1' => ['required'],


        ];
    }
}
