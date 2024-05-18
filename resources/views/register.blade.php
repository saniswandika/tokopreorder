<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko Bangunan Dua Putra</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/assets/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('template/assets/images/favicon.png')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                              <img src="{{asset('image/logo.png')}}" class="mx-auto d-block">
                            </div>
                            <h6 class="font-weight-light">Register in to continue.</h6>
                            <form class="pt-3" action="{{url('register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                    placeholder="Nama" name="name"
                                    value="{{old('name')}}"
                                    >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg @error('no_hp') is-invalid @enderror" 
                                    placeholder="No Hp" name="no_hp"
                                    value="{{old('no_hp')}}"
                                    >
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                    placeholder="Email" name="email"
                                    value="{{old('email')}}"
                                    >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                    placeholder="Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                                </div>


                                <div class="text-center mt-4 font-weight-light"> Sudah punya akun? <a
                                        href="{{url('login')}}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('template/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('template/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('template/assets/js/misc.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>

    <script>
      @if(session()->has('success'))
        swal({
            title: "Berhasil!",
            text: "{{session()->get('success')}}",
            icon: "success",
        });
      @elseif(session()->has('failed'))
        swal({
          title: "Failed!",
          text: "{{session()->get('failed')}}",
          icon: "error",
        });
      @endif
    </script>
    <!-- endinject -->
</body>

</html>