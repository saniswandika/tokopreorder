@extends('template.master')

@section('css')
<style>
    table img {
        cursor: pointer;
    }

    .nav-tabs .nav-link.active {
        color: white;
        background-color: blue;
    }
</style>
@endsection

@php( $fields = ['No','Nama','Barang','Alamat','No Hp'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Pesanan Selesai
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
                            <td>{{$data->user->name}}</td>
                            <td>
                                <ul>
                                    @foreach($data->pesanan as $pesanan)
                                    <li>{{$pesanan->barang->nama_barang}} ( {{$pesanan->jumlah}}
                                        {{$pesanan->barang->satuan_barang}} )</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>
                                {{$data->user->alamat->alamat}} ,
                                <br>
                                Desa {{$data->user->alamat->desa_->name}} ,
                                <br>
                                Kec. {{$data->user->alamat->kecamatan_->name}}
                            </td>
                            <td>
                                {{ $data->user->no_hp }}
                            </td>

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