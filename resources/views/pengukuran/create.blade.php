@extends('layouts.app')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Data Pengukuran</li>
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
<div class="card shadow p-3 mb-5 bg-white rounded border-left-primary">
<div class="row justify-content-center">
        <div class="col-md-8">
        <form action="/pengukuran" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="inlineFormCustomSelect">Tanggal Pengukuran</label>
                <select name="tanggal_pelayanan" class="custom-select mr-sm-2 @error('tanggal_timbang') is-invalid @enderror" id="inlineFormCustomSelect">
                    @php
                        $value = '';
                    @endphp
                    @foreach ($tanggalPelayanan as $option)
                        <option value="{{$option->tanggal_pelayanan ?? null}}">
                            {{$option->tanggal_pelayanan." - ".$value = $option->nama_pelayanan ?? null}}
                        
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="inlineFormCustomSelect">Nama Balita</label>
                <select name="balita_id" class="custom-select mr-sm-2 @error('balita_id') is-invalid @enderror" id="inlineFormCustomSelect">
                    @foreach ($balita as $option)
                        <option value="{{$option->id ?? null}}">{{$option->nama_balita ?? null}}</option>
                    @endforeach
                </select>
            </div>
            @error('nama_balita')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="berat_badan">Berat Badan</label>
                <input autocomplete="off" type="text" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan"  id="berat_badan" value="{{ old('berat_badan') }}">
                @error('berat_badan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tinggi_badan">Tinggi Badan</label>
                <input autocomplete="off" type="text" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan"  id="tinggi_badan" value="{{ old('tinggi_badan') }}">
                @error('tinggi_badan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lingkar_lengan">Lingkar Lengan</label>
                <input autocomplete="off" type="text" class="form-control @error('lingkar_lengan') is-invalid @enderror" name="lingkar_lengan"  id="lingkar_lengan" value="{{ old('lingkar_lengan') }}">
                @error('lingkar_lengan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lingkar_kepala">Lingkar Kepala</label>
                <input autocomplete="off" type="text" class="form-control @error('lingkar_kepala') is-invalid @enderror" name="lingkar_kepala"  id="lingkar_kepala" value="{{ old('lingkar_kepala') }}">
                @error('lingkar_kepala')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="vitamin">Vitamin</label>
                <select name="vitamin" class="custom-select mr-sm-2 @error('vitamin') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                @error('vitamin')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi_1">Asi Bulan Ke-1</label>
                <select name="asi_1" class="custom-select mr-sm-2 @error('asi_1') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                @error('asi_1')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi_2">Asi Bulan Ke-2</label>
                <select name="asi_2" class="custom-select mr-sm-2 @error('asi_2') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                @error('asi_2')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi_3">Asi Bulan Ke-3</label>
                <select name="asi_3" class="custom-select mr-sm-2 @error('asi_3') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                @error('asi_3')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi_4">Asi Bulan Ke-4</label>
                <select name="asi_4" class="custom-select mr-sm-2 @error('asi_4') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                @error('asi_4')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi_5">Asi Bulan Ke-5</label>
                <select name="asi_5" class="custom-select mr-sm-2 @error('asi_5') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                @error('asi_5')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi_6">Asi Bulan Ke-6</label>
                <select name="asi_6" class="custom-select mr-sm-2 @error('asi_6') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                @error('asi_6')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
          
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <input autocomplete="off" type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan"  id="catatan" value="{{ old('tb') }}">
                @error('catatan')
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

<script type="text/javascript">
    $('.date').datepicker({  
       format: 'dd-mm-yyyy'
     });  
</script>

@endsection