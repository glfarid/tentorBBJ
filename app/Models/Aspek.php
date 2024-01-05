<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kriteria(){
        return $this->hasMany(Kriteria::class);
    } 

    public function penilaian(){
        return $this->hasMany(Penilaian::class); // karena banyak nilai aspek_id yang sama 1, 1 aspek memilik banyak nilai 
    }


}
