<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gajis';
    protected $fillable = [
        'dosen_id',
        'total_ngajar',
        'minimal_mengajar',
        'jumlah_minggu',
        'honor_sks',
    ];

    public static function getGaji()
    {
        return self::count();
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'dosen_id');
    }
}
