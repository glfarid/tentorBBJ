<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionPemahaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'questions_pemahaman';
    
    public function responsespemahaman()
    {
        return $this->hasOne(ResponsePemahaman::class);
    }
}
