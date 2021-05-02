@extends('layouts.backend')

@section('title', 'List Outlet')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Outlet</h4>
    </div>

    
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow">
            <form method="POST" action="{{route('updateOutlet',$data->id_outlet)}}" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Update Outlet</h4>
            </div>
            <div class="card-body">
                @csrf
                <input type="hidden" name="_id" value="{{Hash::make($data->id_outlet)}}">
                <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required="" placeholder="Contoh: Kencana Laundry">
                </div>
                <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required="" placeholder="Contoh: Bekasi, Jawa Barat">{{$data->alamat}}</textarea>
                </div>
                <div class="form-group ">
                <label>No Telepon</label>
                <input type="number" name="notelp" class="form-control" value="{{$data->tlp}}" required="" placeholder="Contoh: 085600121789">
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{route('getOutlet')}}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    
    </div>
</div>
@endsection