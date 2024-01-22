<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPajakRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'merek' => 'required',
            'nopol' => 'required',
            'tahun_kendaraan' => 'required',
            'jatuh_tempo' => 'required',
            'lima_tahun_awal' => 'required',
            'lima_tahun_akhir' => 'required'
        ];
    }

    function messages()
    {
        return [
            'merek.required' => 'Merek wajib diisi!',
            'nopol.required' => 'Nomor Polisi wajib diisi!',
            'tahun_kendaraan.required' => 'Tahun Kendaraan wajib diisi!',
            'jatuh_tempo.required' => 'Jatuh Tempo wajib diisi!',
            'lima_tahun_awal.required' => '5 Tahunan awal wajib diisi!',
            'lima_tahun_akhir.required' => '5 Tahunan akhir wajib diisi!'

        ];
    }
}
