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
                <select name="tanggal_pengukuran" class="custom-select mr-sm-2 @error('tanggal_timbang') is-invalid @enderror" id="inlineFormCustomSelect">
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
                <label for="berat_badan">Berat Badan <span style="font-weight: light; font-size: 10px">(KG)</span></label>
                <input autocomplete="off" type="text" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan"  id="berat_badan" value="{{ old('berat_badan') }}">
                @error('berat_badan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tinggi_badan">Tinggi Badan <span style="font-weight: light; font-size: 10px">(CM)</span></label>
                <input autocomplete="off" type="text" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan"  id="tinggi_badan" value="{{ old('tinggi_badan') }}">
                @error('tinggi_badan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lingkar_lengan">Lingkar Lengan <span style="font-weight: light; font-size: 10px">(CM)</span></label>
                <input autocomplete="off" type="text" class="form-control @error('lingkar_lengan') is-invalid @enderror" name="lingkar_lengan"  id="lingkar_lengan" value="{{ old('lingkar_lengan') }}">
                @error('lingkar_lengan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="lingkar_kepala">Lingkar Kepala <span style="font-weight: light; font-size: 10px">(CM)</span></label>
                <input autocomplete="off" type="text" class="form-control @error('lingkar_kepala') is-invalid @enderror" name="lingkar_kepala"  id="lingkar_kepala" value="{{ old('lingkar_kepala') }}">
                @error('lingkar_kepala')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="vitamin">Vitamin</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vitamin" id="radioVitamin1" value="Ya" checked>
                        <label class="form-check-label" for="radioVitamin1">
                            Ya
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="radio" name="vitamin" value="Tidak" id="radioVitamin2">
                        <label class="form-check-label" for="radioVitamin2">
                            Tidak
                        </label>
                    </div>
                </div>
                @error('vitamin')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi_ke">Asi Bulan Ke-</label>
                <select name="asi_ke" class="custom-select mr-sm-2 @error('asi_1') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option selected></option>
                    <option value="asi_1">1</option>
                    <option value="asi_2">2</option>
                    <option value="asi_3">3</option>
                    <option value="asi_4">4</option>
                    <option value="asi_5">5</option>
                    <option value="asi_6">6</option>
                </select>
                @error('asi_1')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="asi">Diberi Asi</label>
                <div class="d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="asi" id="flexRadioDefault1" value="Ya" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Ya
                        </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="radio" name="asi" value="Tidak" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Tidak
                        </label>
                    </div>
                </div>

                {{-- <select name="asi" class="custom-select mr-sm-2 @error('asi') is-invalid @enderror" id="inlineFormCustomSelect">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select> --}}
                @error('vitamin')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea autocomplete="off" type="text" class="form-control @error('catatan') is-invalid @enderror" name="catatan"  id="catatan" value="{{ old('tb') }}"></textarea>
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
