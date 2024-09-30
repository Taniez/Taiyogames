<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('idadmin');
            $table->string("admin_name");
            $table->string("admin_password");
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('admins')->insert([
            ['idadmin' => 1, 'admin_name' => 'priz@gmail.com', 'admin_password' => 'priz545297']
        ]);
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('developer_logs', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
    public function rz(){
    Schema::table('admins', function (Blueprint $table) {
        $table->boolean('admin_name')->default(0); // 0 for regular user, 1 for admin
    });


        }
    };