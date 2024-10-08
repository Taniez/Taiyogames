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
   
    public function gametags()
    {
        return $this->belongsToMany(gametag::class, 'game_gametags', 'idgames', 'idgametag');
    }
    public function user(){
        return $this->belongsTo(User::class);  
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
    public function screenshots(){
        return $this->hasMany(screenshot::class, "idgames");  
    }
    public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}
    public function comments(){
    return $this->hasMany(comment::class, "idgames", "idgames");
}
}
