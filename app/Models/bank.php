<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bank extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public function developer() {
        return $this->belongsTo(developer::class, "iddeveloper");
    }
    public function user_recipst() {
        return $this->hasMany(user_recipt::class, "idbank");
    }
}
