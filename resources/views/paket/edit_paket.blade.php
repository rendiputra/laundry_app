@extends('layouts.backend')

@section('title', 'Input Paket Cucian')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Paket Cucian</h4>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow">
            <form method="POST" action="{{route('updatePaketAction', $data->id_paket)}}" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Paket Cucian</h4>
            </div>
            <div class="card-body">
                @csrf
                <input type="hidden" name="_id" required="" value="{{Hash::make($data->id_paket)}}">
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" required="" placeholder="Nama Laundry" value="{{$data->nama_paket}}">
                </div>
                <div class="form-group">
                    <label>Jenis</label><br>
                    <select name="jenis" class="custom-select">
                        <option @if($data->jenis == "") selected @endif value="">Pilih...</option>
                        <option @if($data->jenis == "kiloan") selected @endif value="kiloan">Kiloan</option>
                        <option @if($data->jenis == "bed_cover") selected @endif value="bed_cover">Bed cover</option>
                        <option @if($data->jenis == "kaos") selected @endif value="kaos">Kaos</option>
                        <option @if($data->jenis == "lain") selected @endif value="lain">DLL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                        </div>
                        <input type="text" class="form-control" name="harga" value="{{$data->harga}}">
                        <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{route('getPaket')}}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    
    </div>
</div>
@endsection