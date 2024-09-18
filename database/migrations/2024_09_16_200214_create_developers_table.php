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
            $table->bigIncrements('iddeveloper');
            $table->string("developer_email");
            $table->foreignId('iddeveloper_log')->constrained('developer_logs', 'iddeveloper_log');

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
        Schema::table('gametypes', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
