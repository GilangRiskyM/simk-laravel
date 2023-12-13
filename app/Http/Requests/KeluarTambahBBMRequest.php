<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeluarTambahBBMRequest extends FormRequest
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
            'nopol' => 'required',
            'nama_pegawai' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'id_bbm' => 'required',
            'jumlah' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nopol.required' => 'Nomor Polisi wajib dipilih!',
            'nama_pegawai.required' => 'Nama Pegawai wajib diiisi!',
            'nip.required' => 'NIP wajib diisi!',
            'jabatan.required' => 'Jabatan wajib diisi!',
            'id_bbm.required' => 'Jenis BBM wajib diisi!',
            'jumlah.required' => 'Jumlah BBM wajib diisi!'
        ];
    }
}
