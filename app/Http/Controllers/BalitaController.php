<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\OrangTua;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
   //Menampilkan View Index
    public function index()
    {
        $balita = Balita::orderBy('created_at','ASC')->with('orangtua')->paginate(10);
        return view('balita.index', compact('balita'));
    }

    //Menampilkan View Create
    public function create()
    {
    	$orangTua = OrangTua::all();
    	return view('balita.create', compact('orangTua'));
    }

    //Melakukan Eksekusi Penyimpanan Ke Database
    public function store(Request $request)
    {
    	$request->validate([
    		'nama_balita'=> 'required',
    		'anak_ke'=> 'required',
    		'tgl_lahir'=> 'required',
    		'nik_balita'=> 'requeired',
    		'jenis_kelamin'=> 'required',
    		'orang_tua_id'=> 'required',
    	]);
    	Balita::create($request->all());
    	return redirect('/balita')->with('status', 'Data Balita Berhasil Ditambahkan!');
    }

    public function show($id)
    {
    	//
    }

    public function edit($id)
    {
    	$balita = Balita::findOrFail($id);
    	$orangTua = OrangTua::all();
    	return view('balita.edit', compact('orangTua','balita'));
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
    		'nama_balita'=> 'required',
    		'anak_ke'=> 'required',
    		'tgl_lahir'=> 'required',
    		'nik_balita'=> 'requeired',
    		'jenis_kelamin'=> 'required',
    		'orang_tua_id'=> 'required',
    	]);
    	Balita::where('id', $id)
    		->update([
    			'nama_balita'=>$request->nama_balita,
    			'anak_ke'=>$request->anak_ke,
    			'tgl_lahir' =>$request->tgl_lahir,
    			'nik_balita' =>$request->nik_balita,
    			'jenis_kelamin' =>$request->jenis_kelamin,
    			'orang_tua_id' =>$request->orang_tua_id,
    		]);

    	return redirect('/balita')->with('status', 'Data Balita Berhasil Diupdate!');
    }

    public function destroy($id)
    {
    	Balita::destroy($id);
    	return redirect('/balita')->with('status', 'Data Balita Berhasil Dihapus!');
    }
}