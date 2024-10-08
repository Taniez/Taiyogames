<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class gametag extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idgametag';
    protected $fillable = ['gametag_name'];

    public function games()
    {
        return $this->belongsToMany(game::class, 'game_gametags', 'idgametag', 'idgames');
    }
}

