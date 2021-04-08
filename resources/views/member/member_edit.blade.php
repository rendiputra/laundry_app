@extends('layouts.backend')

@section('title', 'List Pelanggan')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Pelanggan</h4>
    </div>

    
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow">
            <form method="POST" action="/pelanggan/update/{{$data->id_member}}" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Update Pelanggan</h4>
            </div>
            <div class="card-body">
                @csrf
                <input type="hidden" name="id_" value="{{$data->id_member}}">
                <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required="">
                </div>
                <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required="">{{$data->alamat}}</textarea>
                </div>
                <div class="form-group ">
                <label>No Telepon</label>
                <input type="number" name="notelp" class="form-control" value="{{$data->tlp}}" required="">
                </div>
                <div class="form-group col-lg-6 mb-0">
                    <label class="form-label">Jenis Kelamin</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="JK" value="L" class="selectgroup-input" @php echo ($data->jenis_kelamin == "L") ? "checked=''" : "" @endphp>
                        <span class="selectgroup-button">Laki-Laki</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="JK" value="P" class="selectgroup-input" @php echo ($data->jenis_kelamin == "P") ? "checked=''" : "" @endphp>
                        <span class="selectgroup-button">Perempuan</span>
                      </label>
                      
                    </div>
                  </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{route('getPelanggan')}}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    
    </div>
</div>
@endsection