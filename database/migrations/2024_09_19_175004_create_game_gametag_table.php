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
        Schema::create('game_gametags', function (Blueprint $table) {
            $table->id('id_game_gametags');
            $table->foreignId('idgames')->constrained('games', 'idgames');
            $table->foreignId('idgametag')->constrained('gametags', 'idgametag');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_gametags',function (Blueprint $table) {
            $table->dropSoftDeletes();
            });
    }
};
