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
        Schema::create('admin_reports', function (Blueprint $table) {
            $table->bigIncrements('idadmin_report');
            $table->string("report_topic");
            $table->string("report_detail");
            $table->foreignId('idgames')->constrained('games', 'idgames');
            $table->foreignId('id')->constrained('users', 'id');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::table('admin_reports', function (Blueprint $table) {
        $table->dropSoftDeletes();
        });
    }
};
