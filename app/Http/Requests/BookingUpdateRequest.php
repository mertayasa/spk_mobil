<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
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
        $todayDate = date('m/d/Y');

        return [
            'id_mobil' => ['required', 'integer', 'gt:0'],
            'id_user' => ['required', 'integer', 'gt:0'],
            'id_sopir' => ['required', 'integer', 'gt:0'],
            'deskripsi' => ['required', 'string'],
            'tgl_mulai_sewa' => ['required', 'after_or_equal:'.$todayDate],
            'tgl_akhir_sewa' => ['required', 'after_or_equal:tgl_mulai_sewa'],
        ];
    }
}
