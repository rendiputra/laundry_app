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
            <form method="POST" action="{{route('createPaketAction')}}" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Input Paket Cucian</h4>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" required="" placeholder="Nama Paket">
                </div>
                <div class="form-group">
                    <label>Jenis</label><br>
                    <select name="jenis" class="custom-select">
                        <option selected value="">Pilih...</option>
                        <option value="kiloan">Kiloan</option>
                        <option value="bed_cover">Bed cover</option>
                        <option value="kaos">Kaos</option>
                        <option value="lain">DLL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                        </div>
                        <input type="text" class="form-control" name="harga" placeholder="Harga" required>
                        <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{route('getPaket')}}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    
    </div>
</div>
@endsection