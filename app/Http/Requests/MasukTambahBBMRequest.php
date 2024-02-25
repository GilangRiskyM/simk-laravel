<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasukTambahBBMRequest extends FormRequest
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
            'id_bbm' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required'
        ];
    }

    function messages()
    {
        return [
            'id_bbm.required' => 'Jenis Kendaraan wajib dipilih!',
            'keterangan' => 'Tahun Anggaran wajib diisi!',
            'jumlah' => 'Jumlah BBM wajib diisi!'
        ];
    }
}
