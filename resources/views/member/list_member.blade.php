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
        <div class="card-header">
          <h4>List Pelanggan</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <thead>
              <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>

@if (!empty($jml))
  @foreach ($data as $d)

              <tr>
                <td>{{$d->nama}}</td>
                <td>{{substr($d->alamat, 0, 100)}}</td>
                <td>{{$d->tlp}}</td>
                <td>
                  <a href="#" class="btn btn-primary">Update</a>
                  <a href="#" class="btn btn-warning">Delete</a>
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
        <div class="card-footer text-right">
          <nav class="d-inline-block">
            <ul class="pagination mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
              <li class="page-item">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>

    
    
    </div>
</div>
@endsection