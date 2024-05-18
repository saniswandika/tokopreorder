@extends('template.master')
@php ( $url = url('barang-bangunan') )
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Barang</h4>
            <form class="forms-sample" action="{{$url.'/'.$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")

                <x-input-form name="nama_barang" type="text" label="Nama Barang" value="{{$data->nama_barang}}" />

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select name="kategori_barang_id"  class="form-control">
                            <option selected disabled>-- Pilih Kategori --</option>
                            @foreach($kategoris as $kategori)
                            <option value="{{$kategori->id}}" {{ $kategori->id == $data->kategori_barang_id ? 'selected' : '' }} >{{$kategori->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <x-input-form name="satuan_barang" type="text" label="Satuan Barang" value="{{$data->satuan_barang}}" />
                <x-input-form name="harga_ambil" type="number" label="Harga Ambil" value="{{$data->harga_ambil}}" />
                <x-input-form name="harga" type="number" label="Harga Jual" value="{{$data->harga}}" />

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="status"  class="form-control">
                            <option value="tersedia" {{ $data->status == "tersedia" ? "selected" : "" }}  >tersedia</option>
                            <option value="pre-order" {{ $data->status == "pre-order" ? "selected" : "" }}>pre-order</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi"  class="form-control @error('deskripsi') is-invalid @enderror">{{$data->deskripsi}}</textarea>
                    </div>
                </div>

                <x-input-form name="foto_barang" type="file" label="Foto Barang" />


                <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection