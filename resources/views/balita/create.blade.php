@extends('layouts.app')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #F38BA0">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/balita" style="color: #F38BA0">Data Balita</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data Balita</li>
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
            <form action="/balita" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="nama_balita">Nama Balita</label>
                    <input autocomplete="off" type="text" class="form-control @error('nama_balita') is-invalid @enderror" name="nama_balita"  id="nama_balita" value="{{ old('nama_balita') }}">
                    @error('nama_balita')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="anak_ke">Anak Ke-</label>
                    <input autocomplete="off" type="text" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke"  id="anak_ke" value="{{ old('anak_ke') }}">
                    @error('anak_ke')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input autocomplete="off" type="date" class="date form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"  id="tgl_lahir" value="{{ old('tgl_lahir') }}">
                    @error('tgl_lahir')
                   <div class="invalid-feedback">
                   {{$message}}
                   </div>
                   @enderror
               </div>
               <div class="form-group">
                    <label for="nik_balita">NIK Balita</label>
                    <input autocomplete="off" type="text" class="form-control @error('nik_balita') is-invalid @enderror" name="nik_balita"  id="nik_balita" value="{{ old('nik_balita') }}">
                    @error('nik_balita')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
               <div class="form-group">
                    <label for="tgl_lahir">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="custom-select mr-sm-2 @error('jenis_kelamin') is-invalid @enderror" id="inlineFormCustomSelect">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inlineFormCustomSelect">Nama Orang Tua</label>
                    <select name="orang_tua_id" class="custom-select mr-sm-2 @error('orang_tua_id') is-invalid @enderror" id="inlineFormCustomSelect">
                        @foreach ($orangTua as $option)
                            <option value="{{$option->id ?? null}}">{{$option->nama_ortu ?? null}}</option>
                        @endforeach
                    </select>
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
