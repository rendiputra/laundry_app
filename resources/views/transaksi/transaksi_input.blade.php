@extends('layouts.backend')

@section('title', 'Input Outlet')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Transaksi</h4>
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card shadow">
            <form method="POST" action="{{route('createTransaksiAction')}}" enctype="multipart/form-data">
            <div class="card-header">
                <h4>Input Transaksi</h4>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <select id="select-state" name="member" placeholder="Pilih nama member">
                        <option value="0">Bukan member</option>
            @foreach ($dataUser as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Batas waktu</label>
                    <input type="date" name="batas_waktu" class="form-control" required="" value="{{Carbon\Carbon::now()->addDays(7)->format('Y-m-d')}}">
                </div>
                <div class="form-group ">
                    <label>Biaya tambahan</label>
                    <input type="number" name="biaya_tambahan" class="form-control" placeholder="Contoh: 1000">
                </div>
                <div class="form-group ">
                    <label>Diskon</label>
                    <input type="number" name="diskon" class="form-control" placeholder="Contoh: 10" >
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select" name="status">
                        <option value="">==Pilih status==</option>
                        <option value="baru">Baru</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                        <option value="diambil">diambil</option>
                        <option value="batal">batal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status pembayaran</label>
                    <select class="custom-select" name="dibayar">
                        <option value="">==Pilih Status pembayaran==</option>
                        <option value="0">Belum dibayar</option>
                        <option value="1">Sudah dibayar</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{route('getTransaksi')}}" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script>
$(document).ready(function () {
  $("#select-state").selectize({
      sortField: 'text'
  });
});
</script>
    
@endsection