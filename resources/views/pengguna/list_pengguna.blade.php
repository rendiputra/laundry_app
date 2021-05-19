@extends('layouts.backend')

@section('title', 'Paket Produk')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Users</h4>
    </div>  
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card shadow">
        <div class="card-header">
          <h4>List Akun Users</h4>
        </div>
        <div class="card-body">
          <a href="{{route('createPengguna')}}" class="btn btn-primary mb-4">Input User baru</a>
          
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
            <table class="table table-bordered table-md bg-white">
              <thead>
              <tr>
                <th style="width: 15%">Nama User</th>
                <th style="width: 30%">Email</th>
                <th style="width: 25%">Cabang Outlet</th>
                <th style="width: 20%">Action</th>
              </tr>
              </thead>
              <tbody>
@if (!empty($jml))
  @foreach ($data as $d)
              <tr>
                <td>{{$d->name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->nama}}</td>
                <td>
                    {{-- <div class="row">
                        
                    </div> --}}
                    <form class="row" method="POST" action="{{route('deletePaket',$d->id)}}">
                        <a href="{{route('updatePaket', $d->id)}}" class="btn btn-primary mt-1 ml-3">Update</a>
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-danger ml-3 mt-1">Delete</button>
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
        <div class="d-flex justify-content-center">
          {!! $data->links() !!}
        </div>
    </div>
  </div>
</div>
@endsection