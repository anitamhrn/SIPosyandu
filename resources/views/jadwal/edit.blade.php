@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<div class="">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/jadwal" style="color: #fd6bc5">Jadwal Pelayaan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Jadwal Pelayanan</li>
    </ol>
</nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card shadow p-3 mb-5 bg-white rounded">
             <form action="/jadwal/{{$jadwal->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama_pelayanan">Nama Pelayanan</label>
                    <input type="text" class="form-control @error('nama_pelayanan') is-invalid @enderror" name="nama_pelayanan"  id="nama_pelayanan" value="{{ old('nama_pelayanan', $jadwal->nama_pelayanan) }}">
                    @error('nama_pelayanan')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_pelayanan">Tanggal Pelayanan</label>
                    <input autocomplete="off" type="text" class="date form-control @error('tanggal_pelayanan') is-invalid @enderror" name="tanggal_pelayanan"  id="tanggal_pelayanan" value="{{ old('tanggal_pelayanan', $jadwal->tanggal_pelayanan) }}">
                    @error('tanggal_pelayanan')
                   <div class="invalid-feedback">
                   {{$message}}
                   </div>
                   @enderror
               </div>
               <div class="form-group">
                    <label for="tempat_pelayanan">Tempat Pelayanan</label>
                    <input type="text" class="form-control @error('tempat_pelayanan') is-invalid @enderror" name="tempat_pelayanan"  id="tempat_pelayanan" value="{{ old('tempat_pelayanan', $jadwal->tempat_pelayanan) }}">
                    @error('tempat_pelayanan')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $('.date').datepicker({
       format: 'yyyy-mm-dd'
     });
</script>

@endsection