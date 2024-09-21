<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class game extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'idgames';
    protected $fillable = ['Game_name', 'Game_info', 'version', 'Game_preview', 'Game_dowload_link'];
   
    public function gametypes()
    {
        return $this->belongsToMany(gametype::class, 'game_gametypes', 'idgames', 'idgametypes');
    }
   
    public function admin_reports() {
        return $this->hasMany(admin_report::class, "idgames");
    }
    public function developer_logs() {
        return $this->hasMany(developer_log::class, "idgames");
    }
    public function develop_gamestats() {
        return $this->hasMany(develop_gamestat::class, "idgames");
    }
    public function user_collections() {
        return $this->hasMany(user_collection::class, "idgames");
    }
    public function gamerates(){
        return $this->hasMany(gamerate::class, "idgames");  
        
    }
}
