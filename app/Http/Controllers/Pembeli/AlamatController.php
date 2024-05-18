<?php

namespace App\Http\Controllers\Pembeli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kecamatan;
use App\Models\desa;
use App\Models\alamat;

class AlamatController extends Controller
{
   
    public function index()
    {
        $kecamatan = kecamatan::where('regency_id','3510')
        ->orderBy('name','ASC')
        ->get();
        $alamat = alamat::where("user_id",auth()->user()->id)->first();
        return view('pembeli.alamat',compact('kecamatan','alamat'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "kecamatan"=>"required",
            "desa"=>"required",
            "alamat"=>"required",
        ]);

        alamat::updateOrCreate(["user_id"=>auth()->user()->id],[
            "kabupaten"=>"Banyuwangi",
            "kecamatan"=>$request->kecamatan,
            "desa"=>$request->desa,
            "alamat"=>$request->alamat,
        ]);

        return redirect()->back()->with('success',"Alamat berhasil disimpan");
    }

    public function show($id)
    {
        $desa = desa::where('district_id',$id)
        ->orderBy('name','ASC')
        ->get();
        return response()->json($desa);
    }

   
}
