@extends('template.master')
@php ( $url = url('barang-bangunan') )
@php( $fields = ['No','Nama Barang','Jumlah','Satuan','Harga','Status','Barang','Option'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Barang

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
                            <td>{{$data->nama_barang}}</td>
                            <td>{{$data->jumlah_barang}}</td>
                            <td>{{$data->satuan_barang}}</td>
                            <td>{{$data->harga}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <img src="{{asset('image/foto_barang/'.$data->foto_barang)}}" style="width:35px;height:35px;">
                            </td>
                            <td>

                            <form action="{{$url.'/'.$data->id}}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{$url.'/'.$data->id.'/edit'}}" class="btn btn-sm btn-warning"> <i
                                        class="fa fa-edit"></i> </a>

                                    <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                
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