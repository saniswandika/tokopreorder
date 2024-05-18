@extends('shop.master')
@section('css')
<style>
     .product-item .des{
        display : none;
    }
    .product-item:hover  .des{
        display : block;
    }
</style>

@endsection
@section('content')

<!-- Slider -->

<div class="main_slider" style="background-image:url({{asset('image/banner/banner_bangunan.png')}})">
    <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                <div class="main_slider_content">
                    <h6>Toko Bangunan Dua Putra</h6>
                    <h1>Selamat datang <h3>Silahkan melakukan pembelian</h3>
                    </h1>
                    <div class="red_button shop_now_button"><a href="#allbarang">Beli Barang</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- New Arrivals -->

<div class="new_arrivals" id="allbarang">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Barang Bangunan</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <!-- <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                            data-filter="*">all</li>
                        @foreach($kategori_barangs as $kategori)
                        @if(!$kategori->barang->isEmpty())
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                            data-filter=".kategori-{{$kategori->id}}">{{$kategori->kategori}}</li>
                        @endif
                        @endforeach

                    </ul>
                </div>
            </div> -->

            <div class="col-md-3 form-group mt-4">
                <select name="" id="filter_kategori" class="form-control">
                    <option value="" >Semua Kategori</option>
                    @foreach($kategori_barangs as $kategori)
                    @if(!$kategori->barang->isEmpty())
                    <option value=".kategori-{{$kategori->id}}">{{$kategori->kategori}}</option>
                    @endif
                    @endforeach

                </select>
            </div>

        </div>
        <div class="row product-grid">
            <!-- <div class="col"> -->
                <!-- <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'> -->

                    <!-- Product 1 -->

                    @foreach($barangs as $barang)

                    <div class="product-item kategori-{{$barang->kategori_barang_id}} float-start">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                <img style="height:180px;"
                                    src="{{asset('image/foto_barang/'.$barang->foto_barang)}}" alt="">
                            </div>
                            <div class="favorite favorite_left"></div>
                            <div
                                class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                <span style="font-size:8px;">{{$barang->status}}</span></div>
                            <div class="product_info">
                                <h6 class="product_name"><a href="single.html">
                                        {{$barang->nama_barang}}
                                    </a></h6>
                                <div class="product_price">@currency($barang->harga)</div>
                                <p class="des">{{$barang->deskripsi}}</p>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button"><a href="{{url('barang/'.$barang->id)}}">Beli</a>
                        </div>
                    </div>

                    @endforeach

                    


                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>



<!-- Benefit -->

<div class="benefit">
    <div class="container">
        <div class="row benefit_row">
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>pengiriman</h6>
                        <p>Diantar Ketempat Tujuan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>pembayaran</h6>
                        <p>Pembayaran Online</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>pengembalian</h6>
                        <p>Pengembalian Bila Rusak</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>Buka Setiap Hari</h6>
                        <p>8 Pagi - 5 Sore</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $("#filter_kategori").on('change',()=>{
        let filter = $("#filter_kategori").val()
        $(".product-grid").find(".product-item").addClass("d-none")
        $(".product-grid").find(filter).removeClass("d-none")
        if(filter == ''){
            $(".product-grid").find(".d-none").removeClass("d-none")
        }
        // $(".product-grid").filter(`:not(${filter})`).hide()
        // console.log(filter)
    })
</script>
@endsection