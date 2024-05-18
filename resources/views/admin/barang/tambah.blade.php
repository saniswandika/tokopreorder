@extends('template.master')
@php ( $url = url('barang-bangunan') )
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Barang</h4>
            <form class="forms-sample" action="{{$url}}" method="post" enctype="multipart/form-data">
                @csrf

                <x-input-form name="nama_barang" type="text" label="Nama Barang" value="{{old('nama_barang')}}" />

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select name="kategori_barang_id"  class="form-control">
                            <option selected disabled>-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <x-input-form name="satuan_barang" type="text" label="Satuan Barang" value="{{old('satuan_barang')}}" />
                <x-input-form name="harga_ambil" type="number" label="Harga Ambil" />
                <x-input-form name="harga" type="number" label="Harga Jual" />

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="status"  class="form-control">
                            <option value="tersedia">tersedia</option>
                            <option value="pre-order">pre-order</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi"  class="form-control @error('deskripsi') is-invalid @enderror">{{old('deskripsi')}}</textarea>
                    </div>
                </div>

                <x-input-form name="foto_barang" type="file" label="Foto Barang" />


                <button type="submit" class="btn btn-sm btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection