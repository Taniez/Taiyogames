<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',  'idgames'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
{
    return $this->belongsTo(game::class, 'idgames');  // หรือใช้ 'idgames' ถ้าชื่อคอลัมน์ในฐานข้อมูลเป็น idgames
}
}
