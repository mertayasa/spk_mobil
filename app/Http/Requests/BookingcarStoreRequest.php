<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingcarStoreRequest extends FormRequest
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
        $todayDate = date('dd-MM-yyyy');

        return [
            'id_mobil' => ['required', 'integer', 'gt:0'],
            'id_user' => ['required', 'integer', 'gt:0'],
            'id_driver' => ['required', 'integer', 'gt:0'],
            'id_catatan' => ['required', 'string'],
            'id_date_from' => ['required', 'after_or_equal:'.$todayDate],
            'id_date_to' => ['required', 'after_or_equal:id_date_to'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id_mobil.required' => 'Mohon tidak melakukan hal yang aneh',
            'id_user.required' => 'Mohon tidak melakukan hal yang aneh',
            'id_driver.required' => 'Mohon pilih sopir anda',
            'id_catatan.required' => 'Mohon catatan diisi',
            'id_date_from.required' => 'Mohon mengisi tanggal mulai sewa',
            'id_date_to.required' => 'Mohon mengisi tanggal berakhir sewa'
        ];
    }
}
