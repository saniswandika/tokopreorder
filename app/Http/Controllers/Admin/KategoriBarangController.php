<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategori_barang;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $datas = kategori_barang::all();
        return view('admin.kategori-barang.index',compact('datas'));
    }


    public function create()
    {
        return view('admin.kategori-barang.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori'=>'required'
        ]);

        kategori_barang::create($request->all());

        return redirect('kategori-barang')->with('success','Kategori Berhasil ditambahkan');
    }

    
    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $data = kategori_barang::findOrFail($id);
        return view('admin.kategori-barang.edit',compact('data'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori'=>'required'
        ]);
        $data = kategori_barang::findOrFail($id);
        $data->update($request->all());

        return redirect('kategori-barang')->with('success','Kategori Berhasil diubah');
    }

   
    public function destroy($id)
    {
        kategori_barang::findOrFail($id)->delete();
        return redirect('kategori-barang')->with('success','Kategori Berhasil dihapus');
    }
}
