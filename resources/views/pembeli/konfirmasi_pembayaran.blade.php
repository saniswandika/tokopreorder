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
                                            <td>Nama</td>
                                            <td> : {{auth()->user()->name}}</td>
                                        </tr>

                                        <tr>
                                            <td>No Hp</td>
                                            <td> : {{auth()->user()->no_hp}}</td>
                                        </tr>

                                        <tr>
                                            <td>Alamat</td>
                                            <td> : {{auth()->user()->alamat->alamat}} ,
                                            Desa {{auth()->user()->alamat->desa_->name}} ,
                                            Kec. {{auth()->user()->alamat->kecamatan_->name}}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>


                            <div class="col-md-12 mt-2">
                                <h5>Pesanan {{$keranjangs[0]->barang->status == "pre-order" ? "Pre-Order":""}} </h5>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($total = 0)
                                        @foreach($keranjangs as $keranjang)
                                        @php($total = $total + $keranjang->jumlah * $keranjang->barang->harga)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$keranjang->barang->nama_barang}}</td>
                                            <td>@currency($keranjang->barang->harga)</td>
                                            <td>{{$keranjang->jumlah}}</td>
                                            <td>@currency($keranjang->jumlah * $keranjang->barang->harga)</td>
                                        </tr>
                                       
                                        @endforeach
                                        <tr class="bg-primary text-white">
                                            <td colspan="4"> Total Pembayaran </td>
                                            <td>@currency($total+$kode_unik)</td>
                                        </tr>
                                        @if($keranjangs[0]->barang->status == "pre-order")
                                        <tr class="bg-warning text-white">
                                            <td colspan="4"> Minimal Pembayaran Pre-Order 40% </td>
                                            <td>@currency($total * 40 / 100 + $kode_unik)</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td colspan="5"> Lakukan Pembayaran Sesuai Total Pembayaran diatas untuk mempermudah transaksi. </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>

                            <div class="col-md-12">
                            <h5>Metode Pembayaran</h5>

                            <form action="{{url('keranjang/bayar')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Bank</label>
                                    <select name="metode_pembayaran_id" class="form-control @error('metode_pembayaran') is-invalid @enderror">
                                        <option disabled selected>--Pilih Bank--</option>
                                        @foreach($banks as $bank)
                                            <option  value="{{$bank->id}}">{{$bank->nama_bank}}</option>
                                        @endforeach
                                    </select>

                                    <input type="number" name="kode_unik" value="{{$kode_unik}}" class="d-none">
                              
                                </div>

                                @if($keranjangs[0]->barang->status == "pre-order")
                                    <p class="mt-2 text-danger">"Barang yang anda pesan adalah barang Pre-Order Anda wajib melakukan pembayaran / DP minimal 40 % atau lebih, setelah melakukan pemesanan toko kami akan memberitahu anda etimasi barang akan dikirim</p>
                                @endif

                                <button type="submit" class="btn btn-sm btn-success float-right">Pembayaran</button>
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

<script src="{{asset('js/axios.min.js')}}"></script>

<script>

</script>

@endsection