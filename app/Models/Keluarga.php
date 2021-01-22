<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    public function anggotaKeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class);
    }

    public function bantuan()
    {
        return $this->hasOne(Bantuan::class);
    }

    public function pemilikKartu()
    {
        return $this->hasOne(PemilikKartu::class);
    }
    public function tetangga()
    {
        return $this->hasOne(Tetangga::class);
    }
}
