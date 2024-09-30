<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin_report extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public function user() {
        return $this->belongsTo(admin::class, 'idadmin'); // Adjust the foreign key as needed
    }
}
