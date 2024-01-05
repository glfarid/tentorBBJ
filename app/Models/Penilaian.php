<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penilaian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }
    
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }


}
