@extends('template.master')

@section('css')
<style>
    table img{
        cursor: pointer;
    }
</style>
@endsection

@php( $fields = ['No','Nama','Barang','Total','Bukti Pembayaran','Opsi'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-header">
            <h4 class="card-title">Pesanan
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
                                    @if($data->pesanan[0]->barang->status == "pre-order")
                                    <h6>- Pre-Order</h6>
                                    @endif
                                    <ul>
                                    @foreach($data->pesanan as $pesanan)
                                    <li>{{$pesanan->barang->nama_barang}} ( {{$pesanan->jumlah}} {{$pesanan->barang->satuan_barang}} )</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                  @currency($data->total+ $data->kode_unik)
                                  <br>
                                  @if($data->pesanan[0]->barang->status == "pre-order")
                                  <span class="badge badge-warning">Minimal DP : @currency($data->total * 40/100 + $data->kode_unik)</span>
                                  @endif
                                </td>
                                <td>
                                    <img onClick="viewImage(this)" src="{{asset('image/bukti_pembayaran/'.$data->pembayaran->bukti_pembayaran)}}" alt="" srcset="">
                                </td>
                                <td>
                                    <button onClick="konfirmasi_pembayaran({{$data}})" class="btn btn-sm btn-success">Terima Pembayaran</button>
                                    <br>
                                    <a href="{{url('pesanan-barang/tolak/'.$data->id)}}" class="btn btn-sm btn-danger mt-1">Tolak Pembayaran</a>
                                </td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bukti Pembayaran -->
<div class="modal" role="dialog" id="bukti_pembayaran">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="" style="width:100%;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Knfirmasi -->
<div class="modal" id="konfirmasi_pembayaran" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Terima Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
          @csrf
      <div class="modal-body">
        <div class="preorder"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
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

    function viewImage(el) {
        $("#bukti_pembayaran").modal('show')
        $("#bukti_pembayaran img").attr("src",$(el).attr("src"))
        
    }
    function konfirmasi_pembayaran(data) {
        $("#konfirmasi_pembayaran").modal('show')
        $(".preorder").empty()
        $("#konfirmasi_pembayaran form").attr("action",`{{url('pesanan-barang/terima')}}/${data.id}`)
        if(data.pesanan[0].barang.status == "pre-order"){
            $(".preorder").append(`
            <h3> Barang Pre-Order </h3>
            <br />
            <div class="form-group">
                <label for="">Etimasi Barang Ready</label>
                <input type="date" class="form-control" name="etimasi_ready" required> 
            </div>

            <div class="form-group">
                <label for="">Etimasi Barang Dikirim</label>
                <input type="date" class="form-control" name="etimasi_dikirim" required> 
            </div>

            <div class="form-group">
                <label for="">Pembayaran Diterima</label>
                <input type="number" class="form-control" name="total_bayar" required> 
            </div>
            `)
        }
        
    }
</script>

@endsection