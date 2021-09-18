<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
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
            'id_mobil' => ['required', 'integer', 'gt:0'],
            'id_user' => ['required', 'integer', 'gt:0'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'integer'],
            'tgl_mulai_sewa' => ['required', 'date'],
            'tgl_akhir_sewa' => ['required', 'date'],
        ];
    }
}
