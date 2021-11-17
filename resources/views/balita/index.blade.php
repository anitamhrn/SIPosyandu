@extends('layouts.admin')

@section('content')
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard" style="color: #F38BA0">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Balita</li>
    </ol>
</nav>
<div class="">
    @if (session('status'))
        <div class="alert alert-success">
                {{ session('status') }}
        </div>
    @endif
<div class="">
    <div class="card border-left-danger shadow p-3 mb-5 bg-white rounded">
        <div class="d-flex justify-content-lg-end mb-3">
            <a class="btn btn-outline-secondary" href="/balita/create">
                <span class="icon text"> <i class="bi bi-plus-square"></i> </span>Tambah Data 
            </a>
        </div>

    <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead style="background: #F38BA0" >
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Balita</th>
                <th scope="col">Anak Ke-</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">NIK Balita</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Nama Ortu</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($balita as $key => $item)
                <tr>
                <th scope="row">{{ $key + $balita->firstItem()}}</th>
                    <td>{{$item->nama_balita}}</td>
                    <td>{{$item->anak_ke}}</td>
                    <td>{{date('d F Y',strtotime($item->tgl_lahir))}}</td>
                    <td>{{$item->nik_balita}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{$item->orangtua->nama_ortu}}</td>
                    <td>
                        <form action="/balita/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" ><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="/balita/{{$item->id}}/edit" class="btn btn-primary" ><i class="bi bi-pencil-square"></i></a> 
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{$balita->links()}}
        </div>
    </div>
</div>

@endsection