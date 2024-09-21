<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// class gametype extends Model
// {
//     public function games(){
//         return $this->belongsToMany(game::class);  
//     }
//     use HasFactory;
//     use SoftDeletes;
// }
class gametype extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idgametypes';
    protected $fillable = ['gametype_name'];

    public function games()
    {
        return $this->belongsToMany(game::class, 'game_gametypes', 'idgametypes', 'idgames');
    }
}

