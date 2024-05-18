@extends('shop.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('coloshop/styles/categories_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('coloshop/styles/categories_responsive.css') }}">

<style>
    .account {
        background: none;
    }

    .btn {
        cursor: pointer;
    }

    form .form-control {
        color: black;
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
                    <li><a href="">Home</a></li>
                    <li class="active"><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>Konfirmasi
                            Pembayaran</a></li>
                </ul>
            </div>


            <!-- Main Content -->

            <div class="">

                <div class="card mx-auto">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-7">
                                <h5>Detail Informasi</h5>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Kode Transaksi</td>
                                            <td> : {{ $transaksi->kode_transaksi }}</td>
                                        </tr>
                                        <tr class="bg-primary text-white">
                                            <td>Total Pembayaran</td>
                                            <td>: @currency($transaksi->total + $transaksi->kode_unik)</td>
                                        </tr>
                                        @if(!empty($transaksi->pesanan) && isset($transaksi->pesanan[0]) && $transaksi->pesanan[0]->barang->status == "pre-order")
                                        <tr class="bg-warning text-white">
                                            <td> Minimal Pembayaran Pre-Order 40% </td>
                                            <td>: @currency($transaksi->total * 40 / 100 + $transaksi->kode_unik)</td>
                                        </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <h5>Silahkan Lakukan Pembayaran dan Unggah Bukti Pembayaran</h5>

                                <form action="{{ url('pesanan/'.$transaksi->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    @if($transaksi->pembayaran && $transaksi->pembayaran->bank)
                                        <div class="form-group card">
                                            <p class="mb-0">Nama Bank : {{ $transaksi->pembayaran->bank->nama_bank }}</p>
                                            <p class="mb-0">Nomor Rekning : {{ $transaksi->pembayaran->bank->no_rekening }}</p>
                                            <p>Atas Nama : {{ $transaksi->pembayaran->bank->nama }}</p>
                                        </div>
                                    @else
                                        <p>Informasi pembayaran tidak tersedia.</p>
                                    @endif

                                    <div class="form-group">
                                        <label for="">Unggah Bukti Pembayaran</label>
                                        <input type="file" class="form-control" name="bukti_pembayaran" accept="image/*">
                                    </div>
                                    @if(!empty($transaksi->pesanan) && isset($transaksi->pesanan[0]) && $transaksi->pesanan[0]->barang->status == "pre-order")
                                        <p class="mt-2 text-danger">"Barang yang anda pesan adalah barang Pre-Order Anda wajib melakukan pembayaran / DP minimal 40 % atau lebih, setelah melakukan pemesanan toko kami akan memberitahu anda etimasi barang akan dikirim</p>
                                    @endif

                                    <button type="submit" class="btn btn-sm btn-success float-right">Unggah Pembayaran</button>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/axios.min.js') }}"></script>
<script>
</script>
@endsection
