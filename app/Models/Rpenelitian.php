<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dosen;

class Rpenelitian extends Model
{
    use HasFactory;

    protected $table = 'rpenelitian';
    protected $fillable = [
        'dosen_id', 'judul_penelitian', 'tahun_penelitian', 'bukti_penelitian'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
}
