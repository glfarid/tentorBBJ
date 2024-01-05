<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpribadi extends Model
{
    use HasFactory;

    protected $table = 'dpribadi';
    protected $guarded = ['id'];

    public function user(){

        return $this->belongsTo(User::class);
    }

}

