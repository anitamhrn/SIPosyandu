<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    use HasFactory;
    protected $table= "pengukuran";
    protected $fillable = [
        'jadwal_id',
        'balita_id',
        'berat_badan',
        'tinggi_badan',
        'lingkar_lengan',
        'lingkar_kepala',
        'vitamin',
        'asi_1',
        'asi_2',
        'asi_3',
        'asi_4',
        'asi_5',
        'asi_6',
        'catatan',
    ];
    public function balita(){
        return $this->belongsTo(Balita::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}