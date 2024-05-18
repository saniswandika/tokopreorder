@extends('template.master')
@php ( $url = url('barang-bangunan') )
@php( $fields = ['No','Nama Barang','Jumlah','Satuan','Harga','Status','Barang','Option'] )
@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card text-left">
      <div class="card-body">
        <h4 class="card-title">Profile</h4>

        <form action="{{url('profile-admin')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{auth()->user()->email}}" class="form-control @error('email') is-invalid @enderror">
            </div>

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control @error('name') is-invalid @enderror">
            </div>

            <div class="form-group">
                <label for="">No Hp</label>
                <input type="text" name="no_hp" value="{{auth()->user()->no_hp}}" class="form-control @error('no_hp') is-invalid @enderror">
            </div>

            <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>

        </form>

      </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card text-left">
      <div class="card-body">
        <h4 class="card-title">Ubah Password</h4>

        <form action="{{url('profile-admin/password')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" value="" class="form-control @error('password') is-invalid @enderror">
            </div>

            <button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>

        </form>

      </div>
    </div>
</div>

@endsection

@section('js')

<script>
 
</script>

@endsection