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
        Schema::create('tbl_like', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_post')->nullable();
            $table->unsignedBigInteger('id_story')->nullable();
            $table->unsignedBigInteger('id_comment')->nullable();
            $table->foreign('id_users')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->foreign('id_post')->references('id')->on('tbl_post')->onDelete('cascade');
            $table->foreign('id_story')->references('id')->on('tbl_story')->onDelete('cascade');
            $table->foreign('id_comment')->references('id')->on('tbl_comment')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_like');
    }
};
