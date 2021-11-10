@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #F38BA0">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Jadwal Pelayanan</li>
    </ol>
</nav>
@if (session('status'))
<div class="alert alert-success">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
@endif
<div class="card shadow p-3 mb-5 bg-white rounded border-left-primary">
<div class="d-flex justify-content-lg-end mb-3">
    Jadwal Pelayanan Posyandu
  </div>
  <div class="card-body">
    <div class="col-md-12">
    <form action="/jadwal" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="nama_pelayanan">Nama Pelayanan</label>
            <div class="input-group mb-3">
                <input autocomplete="off" type="text" class="form-control  @error('nama_pelayanan') is-invalid @enderror" name="nama_pelayanan" type="text" placeholder="Jenis Pelayanan" >
                @error('nama_pelayanan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group">
                    <label for="tanggal_pelayanan">Tanggal Pelayanan</label>
                    <input autocomplete="off" type="date" class="date form-control @error('tanggal_pelayanan') is-invalid @enderror" name="tanggal_pelayanan" id="tanggal_pelayanan" value="{{ old('tanggal_pelayanan') }}">
                    {{-- <input autocomplete="off" type="date" class="date form-control @error('tanggal_pelayanan') is-invalid @enderror" name="tanggal_pelayanan"  id="tanggal_pelayanan" value="{{ old('tanggal_pelayanan') }}"> --}}
                    @error('tanggal_pelayanan')
                   <div class="invalid-feedback">
                   {{$message}}
                   </div>
                   @enderror
               </div>
        <div class="form-group">
            <label for="tempat_pelayanan">Tempat Pelayanan</label>
            <input autocomplete="off" placeholder="rumah ..." type="text" class="form-control @error('tempat_pelayanan') is-invalid @enderror" name="tempat_pelayanan"  id="tempat_pelayanan" value="{{ old('tempat_pelayanan') }}">
            @error('tempat_pelayanan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-success">Simpan</button>
    </form>
    </div>
    <div class="m-4">
      <table class="table table-hover">
        <thead style="background: #F38BA0">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pelayanan</th>
            <th scope="col">Tanggal Pelayanan</th>
            <th scope="col">Tempat Pelayanan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=1;
          @endphp
          @foreach ($jadwal as $item)
          <tr>
          <th scope="row">{{$i++}}</th>
            <td>{{$item->nama_pelayanan}}</td>
            <td>{{date('d F Y',strtotime($item->tanggal_pelayanan))}}</td>
            <td>{{$item->tempat_pelayanan}}</td>
            <td>
              <form action="/jadwal/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
              </form>
              {{-- <a href="/jadwal/{{$item->id}}" class="btn btn-primary" ><i class="fas fa-search"></i></a>  --}}
              <a href="/jadwal/{{$item->id}}/edit" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
    $('.date').datepicker({
       format: 'yyyy-mm-dd'
     });
</script>
@endsection
