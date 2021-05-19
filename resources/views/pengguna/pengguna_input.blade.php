@extends('layouts.backend')

@section('title', 'Input User Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>User</h4>
    </div>

    
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow">
            <form method="POST" action="{{route('createPenggunaAction')}}" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Input User Baru</h4>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="nama" class="form-control" required="" placeholder="Nama User">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required="" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required="" placeholder="Konfirmasi Password">
                </div>
                <div class="form-group">
                    <label>Cabang Outlet</label><br>
                    <select name="outlet" class="custom-select">
                        <option selected value="">Pilih...</option>
@foreach ($data as $d)
                        <option value="{{$d->id_outlet}}">{{$d->nama}}</option>
@endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hak Akses</label><br>
                    <select name="hak_akses" class="custom-select">
                        <option selected value="">Pilih...</option>
                        <option value="2">Admin</option>
                        <option value="1">Kasir</option>
                        <option value="0">Owner</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{route('getPengguna')}}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    
    </div>
</div>
@endsection