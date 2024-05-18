<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\metode_pembayaran;

class AkunBankController extends Controller
{
    public function index()
    {
        $datas = metode_pembayaran::all();
        return view('admin.akun-bank.index',compact('datas'));
    }


    public function create()
    {
        return view('admin.akun-bank.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank'=>'required',
            'no_rekening'=>'required',
            'nama'=>'required'
        ]);

        metode_pembayaran::create($request->all());

        return redirect('akun-bank')->with('success','Akun Bank Berhasil ditambahkan');
    }

    
    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $data = metode_pembayaran::findOrFail($id);
        return view('admin.akun-bank.edit',compact('data'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bank'=>'required',
            'no_rekening'=>'required',
            'nama'=>'required'
        ]);
        $data = metode_pembayaran::findOrFail($id);
        $data->update($request->all());

        return redirect('akun-bank')->with('success','Akun Bank Berhasil diubah');
    }

   
    public function destroy($id)
    {
        metode_pembayaran::findOrFail($id)->delete();
        return redirect('akun-bank')->with('success','Akun Bank Berhasil dihapus');
    }
}
