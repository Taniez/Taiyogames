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
        Schema::create('gamerates', function (Blueprint $table) {
            $table->bigIncrements('idgamerate');
            $table->foreignId('idgames')->constrained('games', 'idgames');
            $table->string("gamerate_detail");
            $table->string("gamerate_point");
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
