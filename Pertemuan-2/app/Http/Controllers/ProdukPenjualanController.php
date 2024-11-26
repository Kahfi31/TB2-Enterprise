<?php

namespace App\Http\Controllers;

use App\Models\produk_penjualan;
use App\Http\Requests\Storeproduk_penjualanRequest;
use App\Http\Requests\Updateproduk_penjualanRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;



class ProdukPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function TampilPenjualan()
    {
        $isAdmin = Auth::user()->role == 'admin';
        $produk = $isAdmin ? produk_penjualan::all() : produk_penjualan::where('user_id', Auth::user()->id)->get();

        return view('produk', ['produk' => $produk]);
    }

    public function BuatProduk(Request $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time () . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('public/images', $imageName);
        }

        produk_penjualan::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk,
            'image' => $imageName,
            'user_id' => Auth::user()->id
        ]);

        return redirect(Auth::user()->role.'/produk');
    }

    public function TambahProduk()
    {
        return view('tambah');
    }

    public function HapusProduk($kode_produk)
    {
        produk_penjualan::where('kode_produk', $kode_produk)->delete();

        return redirect(Auth::user()->role.'/produk');
    }

    public function TampilanEdit($kode_produk)
    {
        $ubahproduk = produk_penjualan::where('kode_produk', $kode_produk)->first();
        return view('Edit', compact('ubahproduk'));
    }

    public function UpdateProduk(Request $request, $kode_produk)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('public/images', $imageName);
        }

        produk_penjualan::where('kode_produk', $kode_produk)->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'jumlah_produk' => $request->jumlah_produk,
            'image' => $imageName
        ]);

        return redirect(Auth::user()->role.'/produk');
    }

    public function TampilLaporan()
    {
        $products = produk_penjualan::all();
        return view('laporan', ['products' => $products]);
    }

    public function print()
    {
        //Mengambil semua data produk
        $products = produk_penjualan::all();

        //Load View untuk PDF dengan data produk
        $pdf = Pdf::loadView('report', compact('products'));

        //Menampilkan PDF langsung di browser
        return $pdf->stream('laporan-produk.pdf');
    }
}
