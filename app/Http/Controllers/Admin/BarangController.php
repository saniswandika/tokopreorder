<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\kategori_barang;
use Illuminate\Support\Facades\File; 



class BarangController extends Controller
{
    public function index()
    {
        $datas = barang::all();
        return view('admin.barang.index',compact('datas'));
    }


    public function create()
    {
        $kategoris = kategori_barang::all();
        return view('admin.barang.tambah',compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required|numeric',
            'satuan_barang'=>'required',
            'status'=>'required',
            'kategori_barang_id'=>'required',
            'foto_barang'=>'required|mimes:jpeg,jpg,png,gif'
        ]);

        $barang = $request->all();

        if($request->has('foto_barang')){
            $file = $request->file('foto_barang');
            $tujuan_upload = public_path('/image/foto_barang');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $barang['foto_barang'] = $nama_file;
        }


        barang::create($barang);

        return redirect('barang-bangunan')->with('success','Barang Berhasil ditambahkan');
    }

    
    public function show($id)
    {
        
    }


    public function edit($id)
    {
        $data = barang::findOrFail($id);
        $kategoris = kategori_barang::all();
        return view('admin.barang.edit',compact('data','kategoris'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'=>'required',
            'deskripsi'=>'required',
            'harga'=>'required|numeric',
            'satuan_barang'=>'required',
            'status'=>'required',
            'kategori_barang_id'=>'required',
        ]);

        $data = barang::findOrFail($id);
        $barang = $request->all();

        if($request->has('foto_barang')){
            $file = $request->file('foto_barang');
            $tujuan_upload = public_path('/image/foto_barang');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
            $barang['foto_barang'] = $nama_file;

            $foto_lama = public_path('/image/foto_barang/'.$data->foto_barang);
            if(file_exists($foto_lama)){
                File::delete($foto_lama);
            }
        }

        $data->update($barang);

        return redirect('barang-bangunan')->with('success','Barang Berhasil diubah');
    }

   
    public function destroy($id)
    {
        barang::findOrFail($id)->delete();
        return redirect('barang-bangunan')->with('success','Barang Berhasil dihapus');
    }
}
