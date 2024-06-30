<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jadwal;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $guarded = ['id'];

    public static function getMahasiswa()
    {
        return self::count();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
