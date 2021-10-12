<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingcarUpdateRequest extends FormRequest
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
            'id_driver' => ['required', 'integer', 'gt:0'],
            'id_catatan' => ['required', 'string'],
            'id_date_from' => ['required', 'after_or_equal:'.$todayDate],
            'id_date_to' => ['required', 'after_or_equal:id_date_to'],
        ];
    }
}
