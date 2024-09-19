<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin_report extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public function admin() {
        return $this->belongsTo(admin::class, "idadmin");
    }
    public function report_type() {
<<<<<<< HEAD
        return $this->belongsTo(report_type::class, "idreport_type");
=======
        return $this->belongsTo(report_type::class, "idadmin");
>>>>>>> f645578e596ff653c0daf1a05496eba2267b4b90
    }
}
