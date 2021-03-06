@extends('layouts.admin')

@section('content')
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #F38BA0">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Orang Tua</li>
    </ol>
</nav>
<div class="">
    @if (session('status'))
        <div class="alert alert-success">
                {{ session('status') }}
        </div>
    @endif
<div class="">
    <div class="card border-left-primary shadow p-3 mb-5 bg-white rounded">
        <div class="d-flex justify-content-lg-end mb-3">
            <a class="btn btn-outline-secondary" href="/orangtua/create"><span class="icon text">
                <i class="bi bi-plus-square"></i>
            </span>Tambah Data</a>

        </div>
        <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead style="background: #F38BA0" >
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">No KK</th>
                <th scope="col">NIK</th>
                <th scope="col">No Hp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($orangTua as $key => $item)
                <tr>
                <th scope="row">{{ $key + $orangTua->firstItem()}}</th>
                    <td>{{$item->nama_ortu}}</td>
                    <td>{{$item->no_kk}}</td>
                    <td>{{$item->nik_ortu}}</td>
                    <td>{{$item->no_hp}}</td>
                    <td>{{$item->alamat_ortu}}</td>
                    <td>
                        <form action="/orangtua/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                        </form>
                        {{-- <a href="/orangtua/{{$item->id}}/delete" class="btn btn-primary" onclick="return sweetDel(event)"><i class="bi bi-trash"></i></a> --}}
                        {{-- <a href="/balita/{{$item->id}}" class="btn btn-primary" ><i class="bi bi-search"></i></a>  --}}
                        <a href="/orangtua/{{$item->id}}/edit" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        {{$orangTua->links()}}
        </div>
    </div>
</div>

@endsection
