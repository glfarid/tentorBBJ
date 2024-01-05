<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsePemahaman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'responses_pemahaman';

    public function questions_pemahaman()
    {
        return $this->belongsTo(QuestionPemahaman::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
