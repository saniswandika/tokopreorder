@extends('template.master')
@php ( $url = url('akun-bank') )
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Nomor Rekening</h4>
            <form class="forms-sample" action="{{$url.'/'.$data->id}}" method="post">
                @csrf
                @method('patch')

                <x-input-form name="nama_bank" type="text" label="Nama Bank" value="{{$data->nama_bank}}" />
                <x-input-form name="no_rekening" type="text" label="Nomor Rekening" value="{{$data->no_rekening}}" />
                <x-input-form name="nama" type="text" label="Nama" value="{{$data->nama}}" />

                <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection