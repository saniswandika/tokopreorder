@extends('template.master')
@php( $fields = ['#','Tanggal','Nama Pembeli','Barang','Total'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Rekapitulasi

            </h4>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Tanggal</label>
                    <input type="date"  id="filter_tanggal" class="form-control">
                </div>
            </div>




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
                            <td>{{$data->created_at->format('d/m/Y')}}</td>
                            <td>{{$data->user->name}}</td>
                            <td>
                                <ol>
                                    @foreach($data->pesanan as $pesanan)
                                        <li>{{$pesanan->barang->nama_barang}} ( {{ $pesanan->jumlah .' '.$pesanan->barang->satuan_barang }} )</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td>@currency($data->total)</td>
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
    var table;
    $(document).ready(() => {
        table = $("#datatable").DataTable()
    })

    // table.column(2).search(f_bulan).draw()

    $("#filter_tanggal").on('change',()=>{
        let tanggal = $("#filter_tanggal").val()
        if(tanggal != ''){
            var newTanggal = new Date(tanggal);
            tanggal = `${newTanggal.getDate()}/${newTanggal.getMonth()+1}/${newTanggal.getFullYear()}`;
        }
        table.column(1).search(tanggal).draw()
    })
</script>

@endsection