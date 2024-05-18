@extends('template.master')
@php( $fields = ['#','Nama User','Email','No Hp','Tanggal Daftar'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">User

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
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->no_hp}}</td>
                            <td>{{$data->created_at->format('d/m/Y')}}</td>
                        
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