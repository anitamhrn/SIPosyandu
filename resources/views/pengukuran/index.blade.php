@extends('layouts.app')

@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #F38BA0">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Pengukuran</li>
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
            <a class="btn btn-outline-secondary" href="/pengukuran/create">
                <span class="icon text"> <i class="fas fa-plus"> </i> </span>Tambah Data
            </a>
        </div>

        <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead style="background: #F38BA0" >
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Balita</th>
                <th scope="col">Berat Badan</th>
                <th scope="col">Tinggi Badan</th>
                <th scope="col">Lingkar Lengan</th>
                <th scope="col">Lingkar Kepala</th>
                <th scope="col">Vitamin</th>
                <th scope="col">Asi Bulan Ke-1</th>
                <th scope="col">Asi Bulan Ke-2</th>
                <th scope="col">Asi Bulan Ke-3</th>
                <th scope="col">Asi Bulan Ke-4</th>
                <th scope="col">Asi Bulan Ke-5</th>
                <th scope="col">Asi Bulan Ke-6</th>
                <th scope="col">Catatan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($pengukuran as $key => $item)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$item->nama_balita}}</td>
                    <td>{{$item->berat_badan}} Kg</td>
                    <td>{{$item->tinggi_badan}} Cm</td>
                    <td>{{$item->lingkar_lengan}} Cm</td>
                    <td>{{$item->lingkar_kepala}} Cm</td>
                    <td>{{$item->vitamin}}</td>
                    <td>
                        @if ($item->asi_1 == 'Ya')
                            <i class="bi bi-check-circle text-success icon-asi"></i>
                        @else
                            <i class="bi bi-x-circle text-danger icon-asi"></i>
                        @endif
                    </td>
                    <td>
                        @if ($item->asi_2 == 'Ya')
                            <i class="bi bi-check-circle text-success icon-asi"></i>
                        @else
                            <i class="bi bi-x-circle text-danger icon-asi"></i>
                        @endif
                    </td>
                    <td>
                        @if ($item->asi_3 == 'Ya')
                            <i class="bi bi-check-circle text-success icon-asi"></i>
                        @else
                            <i class="bi bi-x-circle text-danger icon-asi"></i>
                        @endif
                    </td>
                    <td>
                        @if ($item->asi_4 == 'Ya')
                            <i class="bi bi-check-circle text-success icon-asi"></i>
                        @else
                            <i class="bi bi-x-circle text-danger icon-asi"></i>
                        @endif
                    </td>
                    <td>
                        @if ($item->asi_5 == 'Ya')
                            <i class="bi bi-check-circle text-success icon-asi"></i>
                        @else
                            <i class="bi bi-x-circle text-danger icon-asi"></i>
                        @endif
                    </td>
                    <td>
                        @if ($item->asi_6 == 'Ya')
                            <i class="bi bi-check-circle text-success icon-asi"></i>
                        @else
                            <i class="bi bi-x-circle text-danger icon-asi"></i>
                        @endif
                    </td>

                    <td>{{$item->catatan}}</td>
                    <td>
                        <form action="/pengukuran/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                        </form>
                        {{-- <a href="/pengukuran/{{$item->id}}" class="btn btn-primary" ><i class="fas fa-search"></i></a>  --}}
                        <a href="/pengukuran/{{$item->id}}/edit" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        {{$pengukuran->links()}}
        </div>
    </div>
</div>

@endsection
