@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/balita" style="color: #fd6bc5">Data Balita</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Data Balita</li>
    </ol>
</nav>
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
            <form action="/balita/{{$balita->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama_balita">Nama Balita</label>
                    <input type="text" class="form-control @error('nama_balita') is-invalid @enderror" name="nama_balita"  id="nama_balita" value="{{ old('nama_balita', $balita->nama_balita) }}">
                    @error('nama_balita')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="anak_ke">Anak Ke-</label>
                    <input autocomplete="off" type="text" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke"  id="anak_ke" value="{{ old('anak_ke', $balita->anak_ke) }}">
                    @error('anak_ke')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input autocomplete="off" type="text" class="date form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir"  id="tgl_lahir" value="{{ old('tgl_lahir', $balita->tgl_lahir) }}">
                    @error('tgl_lahir')
                   <div class="invalid-feedback">
                   {{$message}}
                   </div>
                   @enderror
               </div>
               <div class="form-group">
                    <label for="nik_balita">NIK Balita</label>
                    <input autocomplete="off" type="text" class="form-control @error('nik_balita') is-invalid @enderror" name="nik_balita"  id="nik_balita" value="{{ old('nik_balita', $balita->nik_balita) }}">
                    @error('nik_balita')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
               <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin :</label> <br>
                    <div class="form-check form-check-inline">
                        <label for="jenis_kelamin">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" id="jenis_kelamin" {{$balita->jenis_kelamin == 'Laki-laki'? 'checked' : ''}} >Laki-Laki
                            <input type="radio" name="jenis_kelamin" value="Perempuan" id="jenis_kelamin" {{$balita->jenis_kelamin == 'Perempuan'? 'checked' : ''}} >Perempuan
                        </label>
                        </div>
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
       format: 'dd-mm-yyyy'
     });  
</script>

@endsection