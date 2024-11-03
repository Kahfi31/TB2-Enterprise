<?php

namespace App\Http\Controllers;

use App\Models\produk_penjualan;
use App\Http\Requests\Storeproduk_penjualanRequest;
use App\Http\Requests\Updateproduk_penjualanRequest;
use Illuminate\Http\Request;

class ProdukPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function TampilPenjualan()
    {
        $produk = produk_penjualan::all();
        return view('produk', ['produk' => $produk]);
    }

    public function BuatProduk(Request $request)
    {
        produk_penjualan::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk
        ]);

        return redirect('/produk');
    }

    public function TambahProduk()
    {
        return view('tambah');
    }

    public function HapusProduk($kode_produk)
    {
        produk_penjualan::where('kode_produk', $kode_produk)->delete();

        return redirect('/produk');
    }

    public function TampilanEdit($kode_produk)
    {
        $ubahproduk = produk_penjualan::where('kode_produk', $kode_produk)->first();
        return view('Edit', compact('ubahproduk'));
    }

    public function UpdateProduk(Request $request, $kode_produk)
    {
        produk_penjualan::where('kode_produk', $kode_produk)->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk
        ]);

        return redirect('/produk');
    }
}
