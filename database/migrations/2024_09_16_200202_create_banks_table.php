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
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('idbank');
            $table->string("bank_name");
            $table->integer("bank_account");
            $table->foreignId('iddeveloper')->constrained('developers', 'iddeveloper');
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
