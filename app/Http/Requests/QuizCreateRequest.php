<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCreateRequest extends FormRequest
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
        // https://laravel.com/docs/8.x/validation#creating-form-requests
        // https://laravel.com/docs/8.x/validation#rule-after
        return [
            'title' => 'required|min:10|max:200',
            'description' => 'max:1000',
            'started_at' => 'nullable|after:' . now(),
            'finished_at' => 'nullable|after:' . now()
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
            'finished_at' => 'Bitiş Tarihi'
        ];
    }
}
