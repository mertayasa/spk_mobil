<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeatailSawStoreRequest extends FormRequest
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
            'id_hasil_saw' => ['required', 'integer', 'gt:0'],
            'id_kriteria' => ['required', 'integer', 'gt:0'],
        ];
    }
}
