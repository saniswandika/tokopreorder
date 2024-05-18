@extends('template.master')
@php ( $url = url('stok-barang') )
@php( $fields = ['No','Tanggal','Nama Barang','Stok'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Stok Barang

                <a href="{{$url.'/create'}}" class="btn btn-sm btn-primary float-right">Tambah
                </a>

            </h4>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            @foreach($fields as $field)
                                <th> {{$field}} </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($datas as $data)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->created_at->format('d-m-Y')}}</td>
                            <td>{{$data->barang->nama_barang}}</td>
                            <td>{{$data->jumlah}}</td>
                     
                                
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(document).ready(() => {
        $("#datatable").DataTable()
    })
</script>

@endsection