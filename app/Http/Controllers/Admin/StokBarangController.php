<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stok_barang;
use App\Models\barang;


class StokBarangController extends Controller
{
    public function index()
    {
        $datas = stok_barang::all();
        return view('admin.stok-barang.index',compact('datas'));
    }


    public function create()
    {
        $barangs = barang::where('status','tersedia')->get();
        return view('admin.stok-barang.tambah',compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah'=>'required',
        ]);

        $barang = barang::find($request->barang_id);
        stok_barang::create($request->all());
        $barang->update([
            'jumlah_barang' => $barang->jumlah_barang + $request->jumlah
        ]);
        

        return redirect('stok-barang')->with('success','Stok Barang Berhasil ditambahkan');
    }

    
    public function show($id)
    {
        
    }


    public function edit($id)
    {

    }

    
    public function update(Request $request, $id)
    {
       
    }

   
    public function destroy($id)
    {
       
    }
}
