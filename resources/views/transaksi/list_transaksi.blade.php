@extends('layouts.backend')

@section('title', 'List History Transaksi')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Transaksi</h4>
    </div>  
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card shadow">
        <div class="card-header">
          <h4>List History Transaksi</h4>
        </div>
        <div class="card-body">
          <a href="{{route('createPengguna')}}" class="btn btn-primary mb-4">Entri Transaksi Baru</a>
          
@if (\Session::has('error'))
          <div class="alert alert-warning alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Peringatan!</strong> {{\Session::get('error')}}
          </div>
@elseif (\Session::has('sukses'))
          <div class="alert alert-info alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Sukses!</strong> {{\Session::get('sukses')}}
          </div>
@elseif (\Session::has('invalid'))
          <div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Invalid!</strong> {{\Session::get('invalid')}}
          </div>
@endif
          <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-md bg-white dataTable">
              <thead>
              <tr>
                <th style="width: 15%">Nama</th>
                <th style="width: 15%">Tanggal</th>
                <th style="width: 10%">Dibayar</th>
                <th style="width: 20%">Total Biaya</th>
                <th style="width: 30%">Action</th>
              </tr>
              </thead>
              <tbody>
@if (!$cekEmpty)
  @foreach ($data as $d)
              <tr>
                <td>{{$d->nama}}</td>
                <td>{{date('d F Y H:i', strtotime($d->tgl))  }}</td>
                <td>
                  @if ($d->dibayar == 0)
                    <span class="badge badge-danger">Belum dibayar</span>
                  @elseif ($d->dibayar == 1)
                    <span class="badge badge-primary">Sudah dibayar</span>
                  @endif
                </td>
                <td>
                    @if ($d->total == 0)
                        Rp. 0,00
                    @elseif ($d->dibayar >= 1)
                        Rp. {{number_format($d->total,2,',','.')}}
                    @endif
                </td>
                <td>
                  
                  <form class="row" method="POST" action="#">
                    <a href="#" class="btn btn-primary mt-1 ml-2">Update</a>
                    <a href="#" class="btn btn-info mt-1 ml-2">Detail Transaksi</a>
                    @if($d->dibayar == 0)
                      @csrf
                      @method('delete')
                      <button type="submit"  class="btn btn-danger ml-2 mt-1">Batalkan</button>
                    @endif
                  </form>
                  
                </td>
              </tr>
  @endforeach
@else
              <tr>
                <th colspan="4" class="text-center">--- Tidak ada data ---</th>
              </tr> 
@endif

              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('plugin')
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
     $('#dataTable').DataTable();
    } );
  </script>
@endsection