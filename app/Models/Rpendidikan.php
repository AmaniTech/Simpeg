<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rpendidikan extends Model
{
    use HasFactory;

    protected $table = 'rpendidikan';
    protected $fillable = [
        'dosen_id', 'nama_institusi','jenjang', 'tahun_masuk', 'tahun_keluar'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
