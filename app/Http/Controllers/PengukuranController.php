<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\OrangTua;
use App\Models\Pengukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengukuranController extends Controller
{
    public function index()
    {
        $tanggalPelayanan = Jadwal::all();
        // $balita = Balita::all();
        // $pengukuran = Pengukuran::orderBy('created_at','ASC')->with('balita')->paginate(10);

        $pengukuran = Balita::orderBy('created_at', 'ASC')
            ->join('pengukuran', 'balita.id', '=', 'pengukuran.balita_id')
            ->select('pengukuran.*', 'balita.nama_balita')
            ->paginate(10);

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
        $no = 1;

        return view('pengukuran.index',compact(
            'tanggalPelayanan',
            'pengukuran',
            // 'balita',
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
            'no'
        ));
    }

    public function create()
    {
        $balita = Balita::all();
        $tanggalPelayanan = Jadwal::all();
        return view('pengukuran.create', compact('tanggalPelayanan', 'balita'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengukuran' => 'required',
            'balita_id'=>'required',
            'berat_badan'=>'required',
            'tinggi_badan'=>'required',
            'lingkar_lengan'=>'required',
            'lingkar_kepala'=>'required',
            'vitamin'=>'required',
            'asi_ke'=>'required',
            'asi'=>'required',
            'catatan'=>'required'
        ]);

        $store = ([
            'tanggal_pengukuran' => $request['tanggal_pengukuran'],
            'balita_id'=> $request['balita_id'],
            'berat_badan'=> $request['berat_badan'],
            'tinggi_badan'=> $request['tinggi_badan'],
            'lingkar_lengan'=> $request['lingkar_lengan'],
            'lingkar_kepala'=> $request['lingkar_kepala'],
            'vitamin'=> $request['vitamin'],
            $request['asi_ke'] => $request['asi'],
            'catatan'=> $request['catatan'],
        ]);

        Pengukuran::create($store);
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
