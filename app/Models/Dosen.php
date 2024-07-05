<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gaji;
use App\Models\User;
use App\Models\Rjabatan;
use App\Models\Rpenelitian;
use App\Models\Rpendidikan;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $guarded = ['id'];

    public static function getJumlahDosen()
    {
        return self::count();
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rjabatans()
    {
        return $this->hasMany(Rjabatan::class);
    }

    public function rpendidikan()
    {
        return $this->hasMany(Rpendidikan::class);
    }

    public function rpenelitian()
    {
        return $this->hasMany(Rpenelitian::class);
    }
    public function jabatan_fungsional()
    {
        return $this->hasMany(JabFungsional::class);
    }
    public function penelitian_luaran()
    {
        return $this->hasMany(PenLuaran::class);
    }
}
