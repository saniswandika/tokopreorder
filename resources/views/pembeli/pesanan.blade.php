@extends('shop.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('coloshop/styles/categories_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('coloshop/styles/categories_responsive.css')}}">

<style>
    .account {
        background: none;
    }

    .btn {
        cursor: pointer;
    }
    form .form-control {
        color : black;
    }
</style>
@endsection

@section('content')



<div class="container product_section_container mb-5">
    <div class="row">
        <div class="col product_section clearfix">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="{{url('')}}">Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right"
                                aria-hidden="true"></i>Pesanan</a></li>
                </ul>
            </div>

            <!-- Sidebar -->

            @include('pembeli.sidebar')


            <!-- Main Content -->

            <div class="main_content">

                <!-- Products -->

                <div class="products_iso">
                    <div class="row">
                        <div class="col">

                            <!-- Product Sorting -->

                            <div class="product_sorting_container product_sorting_container_top py-2 mb-4">


                            </div>

                            <!-- Product Grid -->

                            <div class="keranjang mt-2">

                               <div class="card">
                                   <div class="card-body">

                                   <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pesanans as $pesanan)
                                            <tr>
                                                <td>{{$pesanan->kode_transaksi}}</td>
                                                <td>
                                                    <ul>
                                                    @foreach($pesanan->pesanan as $pesan)
                                                    <li>{{$pesan->barang->nama_barang}} ( {{$pesan->jumlah}} {{$pesan->barang->satuan_barang}} )</li>
                                                    @endforeach
                                                    </ul>
                                                </td>
                                                <td>@currency($pesanan->total+$pesanan->kode_unik)</td>
                                                <td>
                                                    @if($pesanan->status == "pending")
                                                    <span class="badge badge-warning py-2 px-2">
                                                      Belum dibayar
                                                    </span>
                                                    @elseif($pesanan->status == "pembayaran")
                                                    <span class="badge badge-success py-2 px-2">
                                                      Pembayaran Sedang Diverivikasi
                                                    </span>
                                                    @elseif($pesanan->status == "diproses")
                                                    <span class="badge badge-success py-2 px-2">
                                                      Barang Sedang Diproses
                                                    </span>
                                                    @else
                                                    <span class="badge badge-danger py-2 px-2">
                                                      Pembayaran Ditolak
                                                    </span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if($pesanan->status == "pending")
                                                    <a class="btn btn-warning btn-sm" href="{{url('pesanan/'.$pesanan->id)}}">Bayar</a>
                                                    @elseif($pesanan->status == "diproses")
                                                        @if($pesanan->etimasi_ready != null)
                                                            Pre-Order
                                                            <br>
                                                            Etimasi Ready {{$pesanan->etimasi_ready}}
                                                            <br>
                                                            Etimasi Dikirim {{$pesanan->etimasi_dikirim}}
                                                            <br>
                                                            Sisa Pembayaran @currency($pesanan->total - $pesanan->total_bayar)
                                                        @else
                                                            Barang akan dikirim secepatnya, 
                                                            <br>
                                                            Paling Lambat 2 Hari setelah pemesanan
                                                        @endif
                                                   
                                                    @else
                                                    -
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center" >Tidak Ada Pesanan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>


                                   </div>
                               </div>

                            </div>

                            <!-- Product Sorting -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('js')

<script src="{{asset('js/axios.min.js')}}"></script>



@endsection