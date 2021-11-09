<?php

namespace App\Http\Controllers;


use App\Models\Keuangan;
use App\Models\OrangTua;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class OrangTuaController extends Controller
{
    //Menampilkan View Index
    public function index()
    {
        $orangTua = OrangTua::orderBy('created_at','ASC')->paginate(10);
        return view('orang_tua.index', compact('orangTua'));
    }
 //Menampilkan View Create
    public function create()
    {
     $orangTua = OrangTua::all();
     return view('orang_tua.create', compact('orangTua'));
    }

    //Melakukan Eksekusi Penyimpanan ke Database
    public function store(Request $request)
    {
     $request->validate([
      'nama_ortu'=>'required',
      'no_kk'=>'required|min:16',
      'nik_ortu'=>'required',
      'no_hp'=>'required',
      'alamat_ortu'=>'required',
     ]);
     OrangTua::create($request->all());
     return redirect('/orangtua')->with('status', 'Data Orang Tua Berhasil Ditambahkan!');
    }

    public function show($id)
    {

    }

 public function edit($id)
      {
          $orangTua = OrangTua::findOrFail($id);
          return view('orang_tua.edit', compact('orangTua'));
      }
    public function update(Request $request, $id)
    {
     $request->validate([
      'nama_ortu'=>'required',
      'no_kk'=>'required',
      'nik_ortu'=>'required',
      'no_hp'=>'required',
      'alamat_ortu'=>'required',
     ]);
     OrangTua::where('id', $id)
      ->update([
       'nama_ortu'=>$request->nama_ortu,
       'no_kk'=>$request->no_kk,
       'nik_ortu'=>$request->nik_ortu,
       'no_hp'=>$request->no_hp,
       'alamat_ortu'=>$request->alamat_ortu,
      ]);
     return redirect('/orangtua')->with('status', 'Data Orang Tua Berhasil Diupdate!');
    }

    public function destroy($id)
    {
     OrangTua::destroy($id);
     return redirect('/orangtua')->with('status', 'Data Orang Tua Berhasil Dihapus!');
    }

}
