<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin_report extends Model
{
    use HasFactory;
   


    protected $fillable = [
        'user_id',           // เพิ่ม user_id
        'comment_id',
        'idgames',
        'reported_user_id',
        'reason',
    ];

    public function admin() {
        return $this->belongsTo(admin::class, 'idadmin'); // Adjust the foreign key as needed
    }
    public function user(){
        return $this->belongsTo(User::class);  
    }
    public function game()
    {
        return $this->belongsTo(game::class, 'idgames', 'idgames');
    }
}
