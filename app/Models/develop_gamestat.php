<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class develop_gamestat extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public function games() {
        return $this->belongsTo(game::class, "idgames");
    }
    public function user_recipt() {
        return $this->hasOne(user_recipt::class, "iduser_recipts");
    }

}
