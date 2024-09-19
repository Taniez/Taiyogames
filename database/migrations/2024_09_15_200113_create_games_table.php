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
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('idgames');
            $table->string("Game_name");
            $table->string("Game_info");
            $table->string("version");
            $table->string("Game_preview");
            $table->string("Game_dowload_link");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('games', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
