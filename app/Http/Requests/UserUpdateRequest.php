<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $rules = [
            'nama' => ['required', 'string', 'max:50'],
            'telpon' => ['required', 'string', 'max:15'],
            'no_ktp' => ['required', 'string', 'max:16'],
            'photo' => ['nullable', 'string'],
            'alamat' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'min:0', 'max:1'],
            'status_aktif' => ['required', 'min:0', 'max:1']
        ];

        if($this->password != null){
            $rules += ['password' => ['required', 'confirmed', 'min:8']];
        }

        return $rules;
    }
}
