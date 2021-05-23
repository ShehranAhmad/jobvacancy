<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function job()
    {
        return $this->belongsTo(Jobs::class,'job_id','id');
    }
}
