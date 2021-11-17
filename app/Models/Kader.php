<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kader extends Model
{
    use HasFactory;
    protected $table= 'kader';
    protected $fillable = [
        'nama_kader',
        'no_hp',
        'alamat_kader',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
