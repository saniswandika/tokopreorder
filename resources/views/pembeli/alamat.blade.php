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
                                aria-hidden="true"></i>Alamat</a></li>
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
                                        <h5>Alamat Pengiriman</h5>
                                        <form action="{{url('alamat')}}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Kecamatan</label>
                                                <div class="col-sm-10">
                                                    <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror ">
                                                        <option disabled selected>--Pilih Kecamatan--</option>
                                                        @foreach($kecamatan as $kec)
                                                        <option value="{{$kec->id}}">{{$kec->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Desa</label>
                                                <div class="col-sm-10">
                                                    <select name="desa" id="desa" class="form-control @error('desa') is-invalid @enderror ">
                                                        <option disabled selected>--Pilih Desa--</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Detail Alamat</label>
                                                <div class="col-sm-10">
                                                    <textarea name="alamat"  class="form-control @error('alamat') is-invalid @enderror ">{{ $alamat ? $alamat->alamat : '' }}</textarea>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary float-right" type="submit">Simpan</button>
                                        </form>
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

<script>

    $(document).ready(()=>{
        @if($alamat)
            $("#kecamatan").val("{{$alamat->kecamatan}}")
        axios.get(`{{'alamat'}}/{{$alamat->kecamatan}}`)
        .then(res=>{
            $("#desa").empty()
            let desa = "{{$alamat->desa}}"
            res.data.forEach(desa=>{
                $("#desa").append(`
                    <option value="${desa.id}"  >${desa.name}</option>
                `)
            })
            $("#desa").val(desa)
        })
        @endif

    })

    $("#kecamatan").on('change',async ()=>{
        let id = $("#kecamatan").val()
        await axios.get(`{{'alamat'}}/${id}`)
        .then(res=>{
            $("#desa").empty()
            res.data.forEach(desa=>{
                $("#desa").append(`
                    <option value="${desa.id}" >${desa.name}</option>
                `)
            })
        })
    })
</script>

@endsection