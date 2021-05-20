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
            <form method="POST" action="{{route('updatePenggunaAction', $data->id)}}" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Update Data User</h4>
            </div>
            <div class="card-body">
                @csrf
                <input type="hidden" name="_id" required="" value="{{Hash::make($data->id)}}">
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="nama" class="form-control" required="" placeholder="Nama User" value="{{$data->name}}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required="" placeholder="Email" value="{{$data->email}}" readonly>
                </div>
                <div class="form-group">
                    <label>Cabang Outlet</label><br>
                    <select name="outlet" class="custom-select">
                        <option selected value="{{$data->id_outlet}}">{{$data->nama}}</option>
@foreach ($outlet as $d)
                        <option value="{{$d->id_outlet}}">{{$d->nama}}</option>
@endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hak Akses</label><br>
                    <select name="hak_akses" class="custom-select">
                        <option @if($data->isAdmin == "2") selected @endif value="2">Admin</option>
                        <option @if($data->isAdmin == "1") selected @endif value="1">Kasir</option>
                        <option @if($data->isAdmin == "0") selected @endif value="0">Owner</option>
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