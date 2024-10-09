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
        Schema::create('user_recipts', function (Blueprint $table) {
            $table->bigIncrements('iduser_recipts');
            $table->foreignId('id')->constrained('users', 'id');
            $table->integer("Donate");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('user_recipts', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
