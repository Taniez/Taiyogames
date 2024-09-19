<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report_type extends Model
{
    use HasFactory;
    public function admin_reports(){
        return $this->hasMany(admin_report::class);  
    }
}
