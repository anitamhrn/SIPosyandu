<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;
    protected $table= "balita";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nama_balita',
        'anak_ke',
        'tgl_lahir',
        'nik_balita',
        'jenis_kelamin',
        'orang_tua_id',      
    ];

    public function orangtua(){
        return $this->belongsTo(OrangTua::class,'orang_tua_id','id');
    }
    
}