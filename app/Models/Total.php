<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
