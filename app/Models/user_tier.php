<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_tier extends Model

{
    protected $primaryKey = 'id_user_tier';
    use HasFactory;
    use SoftDeletes;

    public function Users(){
        return $this->hasMany(User::class);
    }
}
