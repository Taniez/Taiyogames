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
            $table->id();
            $table->unsignedBigInteger('user_id'); // ผู้ใช้ที่รายงาน
            $table->unsignedBigInteger('comment_id')->nullable(); // คอมเมนต์ที่ถูกรายงาน
            $table->unsignedBigInteger('idgames')->nullable(); // เกมที่ถูกรายงาน
            $table->unsignedBigInteger('reported_user_id')->nullable(); // ผู้ใช้ที่ถูกรายงาน
            $table->text('reason'); // เหตุผลในการรายงาน
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // อ้างอิงคอลัมน์ id_comment ในตาราง game_user
            $table->foreign('comment_id')->references('id_comment')->on('game_user')->onDelete('cascade');
            $table->foreign('idgames')->references('idgames')->on('games')->onDelete('cascade');
            $table->foreign('reported_user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_reports'); // ลบตารางทั้งหมดเมื่อย้อนกลับ migration
    }
};
