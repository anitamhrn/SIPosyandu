<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pengukuran;
use Illuminate\Http\Request;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelayanan'=>'required',
            'tanggal_pelayanan'=>'required',
            'tempat_pelayanan'=>'required',
        ]);
        
        $jadwal = Jadwal::create($request->all());
        return redirect('/jadwal')->with('status','Data Jadwal Pelayanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return view('jadwal.edit' ,compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelayanan'=>'required',
            'tanggal_kegiatan'=>'required',
            'tempat_pelayanan'=>'required',
        ]);
        
        Jadwal::where('id',$id)
                ->update([
                    'nama_pelayanan'=>$request->nama_pelayanan,
                    'tanggal_kegiatan'=>$request->tanggal_kegiatan,
                    'tempat_pelayanan'=>$request->tempat_pelayanan,
                    
                ]);
        return redirect('/jadwal')->with('status','Data Jadwal Pelayanan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect('/jadwal')->with('status','Data Jadwal Pelayanan berhasil dihapus!');
    }
}
