@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/balita" style="color: #fd6bc5">Data Orang Tua</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data Orang Tua</li>
    </ol>
</nav>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
            <form action="/orangtua" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="nama_ortu">Nama Ortu</label>
                    <input autocomplete="off" type="text" class="form-control @error('nama_ortu') is-invalid @enderror" name="nama_ortu"  id="nama_ortu" value="{{ old('nama_ortu') }}">
                    @error('nama_ortu')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input autocomplete="off" type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk"  id="no_kk" value="{{ old('no_kk') }}">
                    @error('no_kk')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
               <div class="form-group">
                    <label for="nik_ortu">NIK Ortu</label>
                    <input autocomplete="off" type="text" class="form-control @error('nik_ortu') is-invalid @enderror" name="nik_ortu"  id="nik_ortu" value="{{ old('nik_ortu') }}">
                    @error('nik_ortu')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
               <div class="form-group">
                    <label for="no_hp">No Hp</label>
                    <input autocomplete="off" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"  id="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
                <div class="form-group">
                <label for="alamat_ortu">Alamat</label>
                    <input autocomplete="off" type="text" class="form-control @error('alamat_ortu') is-invalid @enderror" name="alamat_ortu"  id="alamat_ortu" value="{{ old('alamat_ortu') }}">
                    @error('alamat_ortu')
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
       format: 'dd-mm-yyyy'
     });  
</script>

@endsection