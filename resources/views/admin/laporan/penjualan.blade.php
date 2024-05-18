@extends('template.master')
@php( $fields = ['Bulan','Nama Barang','Jumlah'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Laporan Penjualan

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
                            <td>{{$data->bulan}}</td>
                            <td>{{$data->nama_barang}}</td>
                            <td>{{$data->total}}</td>
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