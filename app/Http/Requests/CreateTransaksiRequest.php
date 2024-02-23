<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTransaksiRequest extends FormRequest
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
            'id_barang'         => 'required',
            'tanggal_transaksi' => 'required',
            'jumlah_terjual'    => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'id_barang'         => 'Nama Barang',
            'tanggal_transaksi' => 'Tanggal Transaksi',
            'jumlah_terjual'    => 'Jumlah Terjual'
        ];
    }

    public function messages()
    {
        return [
            'id_barang.required'       => 'Nama Barang harus diisi !',
            'tanggal_transaksi.required'  => 'Tanggal Transaksi harus diisi !',
            'jumlah_terjual.required'       => 'Jumlah Terjual harus diisi !'
        ];
    }
}
