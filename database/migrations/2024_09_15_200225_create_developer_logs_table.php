<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $primaryKey = 'iddeveloper_log';
    public function up(): void
    {
        Schema::create('developer_logs', function (Blueprint $table) {
            $table->bigIncrements('iddeveloper_log');
            $table->unsignedBigInteger('user_id');
            $table->foreignId('idgames')->constrained('games', 'idgames');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("topic");
            $table->string("detail");
            $table->string("version");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('developer_logs', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
