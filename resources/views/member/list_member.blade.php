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
          <a href="{{route('createPelanggan')}}" class="btn btn-primary mb-4">Input Pelanggan </a>
          
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
                  <a href="{{route('updatePelanggan', $d->id_member)}}" class="btn btn-primary">Update</a>
                  <form method="POST" action="{{route('deletePelanggan',$d->id_member)}}">
                    @csrf
                    @method('delete')
                    <button type="submit"  class="btn btn-danger mt-2">Delete</button>
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