<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
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
            'title' => 'required|min:10|max:200',
            'description' => 'max:1000',
            'finished_at' => 'nullable|after:' . now(),
            'status' => 'required'
        ];
    }

        /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Başlık',
            'description' => 'Açıklama',
            'started_at' => 'Başlangıç Tarihi',
            'finished_at' => 'Bitiş Tarihi',
            'status' => 'Durum'
        ];
    }
}
