<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';
    protected $guarded = ['id'];

    public function matkul()
    {
        return $this->hasMany(Matkul::class);
    }

}
