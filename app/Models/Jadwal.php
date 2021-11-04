<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table= 'jadwal';
    protected $fillable = [
        'nama_pelayanan',
        'tanggal_pelayanan',
        'tempat_pelayanan',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
