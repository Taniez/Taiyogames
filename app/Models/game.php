<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class game extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function gametypes(){
        return $this->belongsToMany(gametype::class);  
    }
    public function gamerates(){
        return $this->hasMany(gamerate::class);  
        
    }
}
