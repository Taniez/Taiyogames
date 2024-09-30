<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class developer_log extends Model
{
    // use HasFactory;
    use SoftDeletes;

    
    public function games() {
        return $this->belongsTo(game::class, "idgames");
    }
}
