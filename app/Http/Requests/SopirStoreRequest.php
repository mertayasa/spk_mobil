<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SopirStoreRequest extends FormRequest
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
            'telpon' => ['required', 'string', 'max:16'],
            'alamat' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string', 'max:50'],
            'tanggal_lahir' => ['required', 'date'],
            'no_ktp' => ['required', 'string', 'max:16'],
        ];
    }
}
