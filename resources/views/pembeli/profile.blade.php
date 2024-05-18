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
                    <li><a href="{{url('')}}">Home</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Profile</a></li>
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



                            <!-- Product Sorting -->

                            <div class="keranjang mt-2">

                                <div class="card">
                                    <div class="card-body">
                                        <h5>Profile</h5>
                                        <form action="{{url('profile')}}" method="post">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" value="{{auth()->user()->email}}"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        disabled>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" value="{{auth()->user()->name}}"
                                                        class="form-control @error('name') is-invalid @enderror">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">NO Hp</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="no_hp" value="{{auth()->user()->no_hp}}"
                                                        class="form-control @error('no_hp') is-invalid @enderror">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
                                                <div class="col-sm-10">
                                                    @php($alamat = auth()->user()->alamat)
                                                    <textarea disabled
                                                        class="form-control">{{ $alamat ? $alamat->alamat.', Desa '.$alamat->desa_->name.', kecamatan '.$alamat->kecamatan_->name.', Kabupaten Banyuwangi': '' }}</textarea>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary float-right" type="submit">Simpan</button>
                                        </form>
                                    </div>
                                </div>


                            </div>

                            <!-- Product Grid -->

                            <div class="keranjang mt-2">

                                <div class="card">
                                    <div class="card-body">
                                        <h5>Ubah Password</h5>
                                        <form action="{{url('profile/password')}}" method="post">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="passowrd" name="password" 
                                                        class="form-control @error('password') is-invalid @enderror">
                                                </div>
                                            </div>

                                            <button class="btn btn-primary float-right" type="submit">Simpan</button>
                                        </form>
                                    </div>
                                </div>


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



@endsection