<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'matkuls';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'jurusan_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

}
