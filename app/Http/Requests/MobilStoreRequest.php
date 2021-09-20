<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobilStoreRequest extends FormRequest
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
            'nama' => ['required', 'string', 'max:50'],
            'id_jenis_mobil' => ['required', 'integer', 'gt:0', 'exists:jenis_mobil,id'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'integer'],
            'jumlah_kursi' => ['required', 'integer'],
            'thumbnail' => ['required', 'string'],
        ];
    }
}
