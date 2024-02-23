<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Transaksi;
use Illuminate\Support\Facades\File;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_Barang = Barang::count('nama_barang');
        $total_Stock = Barang::sum('stock');
        $total_Transaksi = Transaksi::count('tanggal_transaksi');
        $total_Barang_Terjual = Transaksi::sum('jumlah_terjual');

        $barang = Barang::all();
        return view('barang.index', [
            'barang' => $barang,
            'total_Barang' => $total_Barang,
            'total_Stock' => $total_Stock,
            'total_Transaksi' => $total_Transaksi,
            'total_Barang_Terjual' => $total_Barang_Terjual,
        ]);
    }

    public function toko()
    {
        $barang = Barang::all();
        return view('toko.index', [
            'barang' => $barang,
        ]);
    }
    public function addToCart($id)
    {
        $barang = Barang::findOrFail($id);

        $cart = session()->get('barang', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'nama_barang' => $barang->nama_barang,
                'quantity' => 1,
                'stock' => $barang->stock,
                'gambar' => $barang->gambar,
                'jenis_barang' => $barang->jenis_barang
            ];
        }

        session()->put('barang', $cart);
        return redirect()->back()->with('success', 'Berhasil!');
    }

    public function cart()
    {
        return view('toko.cart');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create-barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();

        $gambar = $request->file('gambar');
        $gambar_ekstensi = $gambar->extension();
        $gambar_nama = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar->move(public_path('images'), $gambar_nama);

        $barang = [
            'nama_barang' => $request->nama_barang,
            'gambar' => $gambar_nama,
            'stock' => $request->stock,
            'jenis_barang' => $request->jenis_barang,
        ];

        Barang::create($barang);
        return redirect('/barang')->with('storebarang', 'Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::find($id);
        return view('barang.edit-barang', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validate = $request->validated();

        $barang = Barang::findOrFail($id);

        $barang->nama_barang = $request->nama_barang;
        $barang->stock = $request->stock;
        $barang->jenis_barang = $request->jenis_barang;

        if ($request->hasFile('gambar')) {

            if ($barang->gambar) {
                File::delete(public_path('images') . '/' . $barang->gambar);
            }
            $gambar = $request->file('gambar');
            $gambar_ekstensi = $gambar->extension();
            $gambar_nama = date('ymdhis') . "." . $gambar_ekstensi;
            $gambar->move(public_path('images'), $gambar_nama);

            $barang->gambar = $gambar_nama;
        }

        $barang->save();

        return redirect('/barang')->with('updatebarang', 'Berhasil Ditambahkan !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        File::delete(public_path('images') . '/' . $barang->gambar);
        $barang->delete();
        return redirect('/barang')->with('deletebarang', 'Berhasil Dihapus !');
    }
}
