<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;
    protected $table= "orang_tua";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nama_ortu',
        'no_kk',
        'nik_ortu',
        'no_hp',
        'alamat_ortu',
    ];
    public function balita(){
        return $this->hasMany(Balita::class);
    }
}
