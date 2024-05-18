@extends('template.master')
@php ( $url = url('akun-bank') )
@php( $fields = ['No','Nama Bank','Nomor Rekening','Nama','Option'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Nomor Rekening

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
                            <td>{{$data->nama_bank}}</td>
                            <td>{{$data->no_rekening}}</td>
                            <td>{{$data->nama}}</td>
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