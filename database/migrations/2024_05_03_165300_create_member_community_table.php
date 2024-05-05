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
        Schema::create('member_community', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_community');
            $table->unsignedBigInteger('id_follower');
            $table->string('type');
            $table->foreign('id_community')->references('id')->on('community')->onDelete('cascade');
            $table->foreign('id_follower')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_community');
    }
};
