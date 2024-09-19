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
        Schema::create('gametypes', function (Blueprint $table) {
            $table->bigIncrements('idgametypes');
            $table->string("gametype_name");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('gametypes', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
