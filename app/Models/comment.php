<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class comment extends Model
{
    use HasFactory;

    // public function parent()
    // {
    //     return $this->hasMany(User,'parent');
    // }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
