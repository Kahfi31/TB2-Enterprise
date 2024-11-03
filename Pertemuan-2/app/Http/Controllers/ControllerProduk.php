<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerProduk extends Controller
{
    public function TampilProduk()
    {
        $produk = [
            [
                'name' => 'Produk 1',
                'price' => 'Rp 100.000',
                'description' => 'Deskripsi singkat produk 1.'
            ],
            [
                'name' => 'Produk 2',
                'price' => 'Rp 200.000',
                'description' => 'Deskripsi singkat produk 2.'
            ],
            [
                'name' => 'Produk 3',
                'price' => 'Rp 300.000',
                'description' => 'Deskripsi singkat produk 3.'
            ],
            [
                'name' => 'Produk 4',
                'price' => 'Rp 400.000',
                'description' => 'Deskripsi singkat produk 4.'
            ]
        ];

        return view('produk', compact('produk'));
    }
}
