<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSuratTugasRequest extends FormRequest
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
            'keperluan' => 'required',
            'penumpang' => 'required',
            'tanggal' => 'required',
            'waktu_angka' => 'required',
            'waktu_huruf' => 'required',
            'harga_bbm' => 'required',
            'nama_camat' => 'required',
            'nip_camat' => 'required',
            'nama_kasubbag' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'keperluan.required' => 'Keperluan / Uraian Tugas wajib diisi!',
            'penumpang.required' => 'Jumlah Penumpang wajib diisi!',
            'tanggal.required' => 'Tanggal wajib diisi!',
            'waktu_angka.required' => 'Waktu(angka) wajib diisi!',
            'waktu_huruf.required' => 'Waktu(huruf) wajib diisi!',
            'harga_bbm.required' => 'Harga BBM wajib diisi!',
            'nama_camat.required' => 'Nama Camat wajib diisi!',
            'nip_camat.required' => 'NIP Camat wajib diisi!',
            'nama_kasubbag.required' => 'Kasubbag Umum & Kepeg. wajib diisi!'
        ];
    }
}
