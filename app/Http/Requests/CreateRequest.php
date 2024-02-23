<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'nama_barang' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required',
            'jenis_barang' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'nama_barang'   => 'Nama Barang',
            'gambar'         => 'Gambar',
            'stock'         => 'Stock',
            'jenis_barang'  => 'Jenis Barang'
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required'       => 'Nama Barang harus diisi !',
            'gambar.mimes'                  => 'Gambar harus berupa JPEG,PNG,JPG !',
            'gambar.max'                  => 'Gambar maximal berukuran 2Mb !',
            'stock.required'                  => 'Stock harus diisi !',
            'jenis_barang.required'           => 'Jenis Barang harus diisi !',
        ];
    }
}
