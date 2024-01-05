<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;
    protected $fillable = ['kode_kriteria', 'aspek_id', 'deskripsi', 'nilai', 'jenis'];

    public function aspek()
    {
        return $this->belongsTo(Aspek::class);
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class);
        
    }
}
