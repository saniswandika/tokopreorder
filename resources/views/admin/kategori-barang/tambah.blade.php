@extends('template.master')
@php ( $url = url('kategori-barang') )
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Kategori Barang</h4>
            <form class="forms-sample" action="{{$url}}" method="post">
                @csrf

                <x-input-form name="kategori" type="text" label="Nama Kategori" />

                <button type="submit" class="btn btn-sm btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection