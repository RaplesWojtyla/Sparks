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
        Schema::create('tbl_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_community');
            $table->unsignedBigInteger('id_users');
            $table->string('caption' , 200)->nullable();
            $table->foreign('id_community')->references('id')->on('tbl_community')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_post');
    }
};
