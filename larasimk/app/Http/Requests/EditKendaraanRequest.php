<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditKendaraanRequest extends FormRequest
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
            'merek' => 'required',
            'jenis_kendaraan' => 'required',
            'nama_pegawai' => 'required',
            'nip' => 'required',
            'jabatan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nopol.required' => 'Nomor Polisi wajib diisi!',
            'merek.required' => 'Merek wajib diisi!',
            'jenis_kendaraan.required' => 'Jenis Kendaraan wajib dipilih!',
            'nama_pegawai.required' => 'Nama Pegawai wajib diisi!',
            'nip.required' => 'NIP wajib diisi!',
            'jabatan' => 'Jabatan wajib diisi!'
        ];
    }
}
