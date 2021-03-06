@extends('layouts.app')
 
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<div class="">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/balita" style="color: #fd6bc5">Data Kader Posyandu</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data Kader Posyandu</li>
    </ol>
</nav>
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card shadow p-3 mb-5 bg-white rounded">
            <form action="/kader/{{$kader->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama_kader">Nama Kader</label>
                    <input type="text" class="form-control @error('nama_kader') is-invalid @enderror" name="nama_kader"  id="nama_kader" value="{{ old('nama_kader', $kader->nama_kader) }}">
                    @error('nama_kader')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
               	<div class="form-group">
                    <label for="no_hp">No Hp</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"  id="no_hp" value="{{ old('no_hp', $kader->no_hp) }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
                <div class="form-group">
                <label for="alamat_kader">Alamat</label>
                    <textarea type="text" class="form-control @error('alamat_kader') is-invalid @enderror" name="alamat_kader"  id="alamat_kader" value="{{ old('alamat_kader') }}"> {{$kader->alamat_kader}} </textarea>
                    @error('alamat_kader')
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
