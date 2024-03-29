<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function company()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
