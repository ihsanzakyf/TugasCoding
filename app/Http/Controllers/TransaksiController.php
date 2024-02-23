<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\CreateTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
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


        $transaksi = Transaksi::with('barang')->get();
        return view('transaksi.index', [
            'transaksi' => $transaksi,
            'total_Barang' => $total_Barang,
            'total_Stock' => $total_Stock,
            'total_Transaksi' => $total_Transaksi,
            'total_Barang_Terjual' => $total_Barang_Terjual,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all(); // Mengambil semua data barang
        return view('transaksi.create-transaksi', [
            'barang' => $barang,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTransaksiRequest $request)
    {
        $validate = $request->validated();

        $transaksi = [
            'id_barang'         => $request->id_barang,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jumlah_terjual'    => $request->jumlah_terjual,
        ];

        Transaksi::create($transaksi);
        return redirect('/transaksi')->with('storetransaksi', 'Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::find($id);
        $barang = Barang::all();
        return view('transaksi.edit-transaksi', [
            'transaksi' => $transaksi,
            'barang' => $barang,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, string $id)
    {
        $validate = $request->validated();

        $barang = Transaksi::findOrFail($id);

        $barang->id_barang = $request->id_barang;
        $barang->tanggal_transaksi = $request->tanggal_transaksi;
        $barang->jumlah_terjual = $request->jumlah_terjual;

        $barang->save();

        return redirect('/transaksi')->with('updatetransaksi', 'Berhasil Dirubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect('/transaksi')->with('deletetransaksi', 'Berhasil Dihapus !');
    }
}
