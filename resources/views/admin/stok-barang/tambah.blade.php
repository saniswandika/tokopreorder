@extends('template.master')
@php ( $url = url('stok-barang') )
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Stok Barang</h4>
            <form class="forms-sample" action="{{$url}}" method="post">
                @csrf
                
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <select name="barang_id"  class="form-control">
                            <option selected disabled>-- Pilih Barang --</option>
                            @foreach($barangs as $barang)
                            <option value="{{$barang->id}}">{{$barang->nama_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <x-input-form name="jumlah" type="number" label="Jumlah Barang" />

                <button type="submit" class="btn btn-sm btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection