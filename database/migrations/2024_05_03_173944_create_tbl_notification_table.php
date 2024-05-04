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
        Schema::create('tbl_notification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_comment')->nullable();
            $table->unsignedBigInteger('id_like')->nullable();
            $table->unsignedBigInteger('id_follower')->nullable();
            $table->foreign('id_users')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->foreign('id_comment')->references('id')->on('tbl_comment')->onDelete('cascade');
            $table->foreign('id_like')->references('id')->on('tbl_like')->onDelete('cascade');
            $table->foreign('id_follower')->references('id')->on('tbl_follower')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_notification');
    }
};
