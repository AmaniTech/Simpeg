<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class Jadwal extends Model
{
    use HasFactory;

    protected $table ='jadwals';
    protected $guarded =['id'];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class,'matkul_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'dosen_id');
    }
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'mahasiswa_id');
    }

    public function scopeSortByTanggal($query)
    {
        return $query->orderBy('tanggal');
    }

    public static function getJumlahJadwal()
    {
        return self::count();
    }
}
