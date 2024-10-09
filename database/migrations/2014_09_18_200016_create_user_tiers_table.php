<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_tiers', function (Blueprint $table) {
            $table->id('id_user_tier');
            $table->string("user_tier_name")->default('เล็กมาก');;
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('user_tiers')->insert([
            ['id_user_tier' => 1, 'user_tier_name' => 'ทาส'],
            ['id_user_tier' => 2, 'user_tier_name' => 'คนใช้เเรงงาน'],
            ['id_user_tier' => 3, 'user_tier_name' => 'ใหญ่มากๆ'],
            


        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('user_tiers', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
