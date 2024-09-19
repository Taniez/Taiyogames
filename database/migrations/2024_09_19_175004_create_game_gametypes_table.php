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
        Schema::create('game_gametypes', function (Blueprint $table) {
            $table->foreignId('idgames')->constrained('games', 'idgames');
            $table->foreignId('id_gametypes')->constrained('gametypes', 'idgametypes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_gametypes',function (Blueprint $table) {
            $table->dropSoftDeletes();
            });
    }
};
