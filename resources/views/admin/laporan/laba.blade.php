@extends('template.master')
@php( $fields = ['Bulan','Modal','Pendapatan','Keuntungan'] )
@php( $bln =
['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] )
@php($bulan_sekarang = Carbon\Carbon::now()->format('m'))
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Laporan Pendapatan
                <!-- <button class="btn btn-primary float-right" onClick="tambah_modal()">Tambah Modal</button>x -->
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
                            <td>{{$data["bulan"]}}</td>
                            <td>@currency($data["modal"])</td>
                            <td>@currency($data["pendapatan"])</td>
                            <td>
                                <badge
                                    class="badge-{{$data['pendapatan'] < $data['modal'] ? 'danger' : 'success' }} badge badge-pill">
                                    @currency($data['pendapatan'] - $data['modal'])</badge>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Total Modal</th>
                        <td>@currency($datas->sum('modal'))</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Pendapatan</th>
                        <td>@currency($datas->sum('pendapatan'))</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Keuntungan</th>
                        <td>@currency($datas->sum('pendapatan') - $datas->sum('modal') )</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('tambah-modal')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select name="bulan" class="form-control">
                            @for($i=0;$i<count($bln);$i++) <option value="{{$i+1}}"
                                {{$i+1 == $bulan_sekarang ? 'selected': ''}}>{{$bln[$i]}}</option>
                                @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="tahun" class="form-control">
                            @for($i=date('Y'); $i>=date('Y')-5; $i-=1)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Jumlah Modal</label>
                        <input type="number" name="modal" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(document).ready(() => {
        $("#datatable").DataTable()
    })

    function tambah_modal() {
        $("#modal").modal('show')
    }
</script>

@endsection