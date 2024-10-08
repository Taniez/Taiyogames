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
        Schema::create('developers', function (Blueprint $table) {
            $table->id('iddeveloper');
            $table->string("developer_email");
            $table->string("developer_password");
            $table->string("developer_phonenum");
            $table->string("developer_profile");
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('gametags', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
