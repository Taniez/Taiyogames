<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    // use HasFactory;
    protected $table = "game_user";

    public function user(){
        return $this->belongsTo(User::class); 
    }
    public function game(){
        return $this->belongsTo(game::class, "idgames"); 
    }
}
