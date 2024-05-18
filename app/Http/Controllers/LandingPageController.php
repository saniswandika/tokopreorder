<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\kategori_barang;

class LandingPageController extends Controller
{
    public function index()
    {
        $barangs = barang::all();
        $kategori_barangs = kategori_barang::all();
        return view('guest.landingpage',compact('barangs','kategori_barangs'));
    }

    public function barang($id)
    {
        $barang = barang::findOrFail($id);
        return view('guest.barang',compact('barang'));
    }
}
