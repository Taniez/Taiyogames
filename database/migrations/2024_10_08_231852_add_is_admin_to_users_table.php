<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false); // ค่าพื้นฐานเป็น false
        });
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'admin', 'email'=> 'admin@gmail.com','password'=> bcrypt('admin1234'), 'is_admin' => 1],
        ]);
        DB::table('users')->insert([
            ['id' => 2, 'name' => 'user', 'email'=> 'user@gmail.com','password'=> bcrypt('user1234')],
        ]);
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
