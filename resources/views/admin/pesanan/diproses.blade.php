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

@php( $fields = ['No','Nama','Barang','Alamat','No Hp','Selesai'] )
@php( $fields2 = ['No','Nama','Barang','Alamat','No Hp','Etimasi', 'Sisa Pembayaran' ,'Selesai'] )
@section('content')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Diproses ( {{$datas->where('etimasi_ready',null)->count()}} ) </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Pre-Order ( {{$datas->where('etimasi_ready',"!=",null)->count()}} )</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card">

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
                            @php($n = 1)
                            @foreach($datas as $data)
                            @if($data->etimasi_ready == null))
                            <tr>
                                <td>{{$n++}}</td>
                                <td>{{$data->user->name}}</td>
                                <td>
                                    <ul>
                                    @foreach($data->pesanan as $pesanan)
                                    <li>{{$pesanan->barang->nama_barang}} ( {{$pesanan->jumlah}} {{$pesanan->barang->satuan_barang}} )</li>
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
                                <td>
                                    <a href="{{url('pesanan-proses/'.$data->id)}}" class="btn btn-sm btn-success">Selesai</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card">

        <div class="card-body">

                <div class="table-responsive">
                    <table id="datatable2" class="table table-striped">
                        <thead>
                            <tr>
                                @foreach($fields2 as $field)
                                <th> {{$field}} </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach($datas as $data)
                            @if($data->etimasi_ready != null))
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->user->name}}</td>
                                <td>
                                    <ul>
                                    @foreach($data->pesanan as $pesanan)
                                    <li>{{$pesanan->barang->nama_barang}} ( {{$pesanan->jumlah}} {{$pesanan->barang->satuan_barang}} )</li>
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
                                <td>
                                    Etimasi Ready {{$data->etimasi_ready}}
                                    <br>
                                    Etimasi Dikirim {{$data->etimasi_dikirim}}
                                </td>
                                <td>
                                    @currency($data->total - $data->total_bayar)
                                </td>
                                <td>
                                    <a href="{{url('pesanan-proses/'.$data->id)}}" class="btn btn-sm btn-success">Selesai</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection

@section('js')

<script>
    $(document).ready(() => {
        $("#datatable").DataTable()
        $("#datatable2").DataTable()
    })
</script>

@endsection