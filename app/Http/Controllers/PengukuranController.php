<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\OrangTua;
use App\Models\Jadwal;
use App\Models\Pengukuran;
use Illuminate\Http\Request;

class PengukuranController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        $balita = Balita::all();
        $pengukuran = Pengukuran::orderBy('created_at','ASC')->with('balita','jadwal')->paginate(10);
        $beratBadan = [];
        $tinggiBadan = [];
        $lingkarLengan = [];
        $lingkarKepala = [];
        $vitamin = [];
        $asi1 = [];
        $asi2 = [];
        $asi3 = [];
        $asi4 = [];
        $asi5 = [];
        $asi6 = [];
        $catatan = [];
        
        return view('pengukuran.index',compact(
            
            'pengukuran',
            'jadwal_id',
            'balita',
            'beratBadan',
            'tinggiBadan',
            'lingkarLengan',
            'lingkarKepala',
            'vitamin',
            'asi1',
            'asi2',
            'asi3',
            'asi4',
            'asi5',
            'asi6',
            'catatan',
        ));
    }

    public function create()
    {
        $balita = Balita::all();
        
        $jadwal = Jadwal::all();
        return view('pengukuran.create', compact('jadwal','balita'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'balita_id'=>'required',
            'berat_badan'=>'required',
            'tinggi_badan'=>'required',
            'lingkar_lengan'=>'required',
            'lingkar_kepala'=>'required',
            'vitamin'=>'required',
            'asi_1'=>'required',
            'asi_2'=>'required',
            'asi_3'=>'required',
            'asi_4'=>'required',
            'asi_5'=>'required',
            'asi_6'=>'required',
            'catatan'=>'required'
        ]);
        Pengukuran::create($request->all());
        return redirect('/pengukuran')->with('status','Data Pengukuran berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit(Pengukuran $pengukuran)
    {
        $balita = Balita::all();
        return view('pengukuran.edit',compact('pengukuran','balita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'balita_id'=>'required',
            'berat_badan'=>'required',
            'tinggi_badan'=>'required',
            'lingkar_lengan'=>'required',
            'lingkar_kepala'=>'required',
            'vitamin'=>'required',
            'asi_1'=>'required',
            'asi_2'=>'required',
            'asi_3'=>'required',
            'asi_4'=>'required',
            'asi_5'=>'required',
            'asi_6'=>'required',
            'catatan'=>'required'
        ]);
        Pengukuran::where('id',$id)
        ->update([
            'balita_id'=>$request->balita_id,
            'berat_badan'=>$request->berat_badan,
            'tinggi_badan'=>$request->tinggi_badan,
            'lingkar_lengan'=>$request->lingkar_lengan,
            'lingkar_kepala'=>$request->lingkar_kepala,
            'vitamin'=>$request->vitamin,
            'asi_1'=>$request->asi_1,
            'asi_2'=>$request->asi_2,
            'asi_3'=>$request->asi_3,
            'asi_4'=>$request->asi_4,
            'asi_5'=>$request->asi_5,
            'asi_6'=>$request->asi_6,
            'catatan'=>$request->catatan,

        ]);
        return redirect('/pengukuran')->with('status','Data Pengukuran berhasil diupdate!');

    }

    public function destroy($id)
    {
        Pengukuran::destroy($id);
        return redirect('/pengukuran')->with('status','Data Pengukuran berhasil dihapus!');
    }

    

}