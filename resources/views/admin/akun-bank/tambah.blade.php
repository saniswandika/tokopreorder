@extends('template.master')
@php ( $url = url('akun-bank') )
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Nomor Rekening</h4>
            <form class="forms-sample" action="{{$url}}" method="post">
                @csrf

                <x-input-form name="nama_bank" type="text" label="Nama Bank" />
                <x-input-form name="no_rekening" type="text" label="Nomor Rekening" />
                <x-input-form name="nama" type="text" label="Nama" />

                <button type="submit" class="btn btn-sm btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection