@extends('shop.master')
@section('css')

<link rel="stylesheet" href="{{asset('coloshop/plugins/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('coloshop/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('coloshop/styles/single_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('coloshop/styles/single_responsive.css')}}">

<style>
    .account{
        background :none;
    }
	.tambahkeranjang{
		cursor : pointer;
	}
</style>

@endsection
@section('content')

<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$barang->nama_barang}}</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li class="active"><img src="{{asset('image/foto_barang/'.$barang->foto_barang)}}" alt="" data-image="images/single_2.jpg"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url({{asset('image/foto_barang/'.$barang->foto_barang)}});border:1px solid"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>{{$barang->nama_barang}}</h2>
						<p>{{$barang->deskripsi}}</p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>{{$barang->status}}</span>
					</div>

					<div class="product_price mt-2">@currency($barang->harga)</div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<div class="col-md-12 px-0">
							<span>Stok : {{ $barang->status == "pre-order" ? "-" : $barang->jumlah_barang - $barang->pesanan_terjual[0]->jumlah_terjual}}</span>
							<br>
							<span>Satuan : {{$barang->satuan_barang}}</span>

						</div>

					</div>
				
					<form action="{{url('tambahkeranjang')}}" method="post">
						@csrf
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
					</div>
					<input type="number" value="1" id="jumlah_value" name="jumlah" class="d-none">
					<input type="text" name="barang_id" value="{{$barang->id}}" class="d-none">
					<button class="btn btn-primary mt-3 tambahkeranjang">Tambah Ke Keranjang</button>
					</form>
				</div>
			</div>
		</div>

	</div>

	<!-- Tabs -->


	<!-- Benefit -->

@endsection

@section('js')
<script src="{{asset('coloshop/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{asset('coloshop/js/single_custom.js')}}"></script>
@endsection
