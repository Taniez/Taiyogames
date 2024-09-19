<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class developer extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public function banks() {
        return $this->hasMany(bank::class, "iddeveloper");
    }
    public function developer_logs() {
        return $this->hasMany(developer_log::class, "iddeveloper");
    }

}
