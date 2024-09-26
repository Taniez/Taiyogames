<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class screenshot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['idgames', 'image_path'];
    public function game(){
        return $this->belongsTo(game::class);  
        
    }
}
