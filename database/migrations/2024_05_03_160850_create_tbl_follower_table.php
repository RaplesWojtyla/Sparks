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
        Schema::create('tbl_follower', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_follower');
            $table->unsignedBigInteger('id_following');
            $table->foreign('id_follower')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->foreign('id_following')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_follower');
    }
};
