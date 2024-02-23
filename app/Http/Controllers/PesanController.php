<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('pesan.index', compact('barang'));
    }
}
