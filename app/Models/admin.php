<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public function admin_reports() {
        return $this->hasMany(admin_report::class, "idadmin");
    }
    public function getIsAdminAttribute()
    {
        return $this->attributes['admin_name'] == 1;
    }
}
