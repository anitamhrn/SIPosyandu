@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #F38BA0">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Kader Posyandu</li>
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

  <div class="card-body">
    <div class="col-md-12">
    <form action="/kader" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="nama_kader">Nama Kader</label>
                <input autocomplete="off" type="text" class="form-control  @error('nama_kader') is-invalid @enderror" name="nama_kader" type="text" >
                @error('nama_kader')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
        </div>
        <div class="form-group">
                    <label for="no_hp">No Hp</label>
                    <input autocomplete="off" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"  id="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
               </div>
        <div class="form-group">
                <label for="alamat_kader">Alamat</label>
                    <textarea autocomplete="off" type="text" class="form-control @error('alamat_kader') is-invalid @enderror" name="alamat_kader"  id="alamat_kader" value="{{ old('alamat_kader') }}"></textarea>
                    @error('alamat_kader')
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
            <th scope="col">Nama Kader</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=1;
          @endphp
          @foreach ($kader as $item)
          <tr>
          <th scope="row">{{$i++}}</th>
            <td>{{$item->nama_kader}}</td>
            <td>{{$item->no_hp}}</td>
            <td>{{$item->alamat_kader}}</td>
            <td>
              <form action="/kader/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
              </form>
              <a href="/kader/{{$item->id}}/edit" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
