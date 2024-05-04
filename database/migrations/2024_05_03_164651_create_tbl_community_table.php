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
        Schema::create('tbl_community', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_creator');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('file_profil')->nullable();
            $table->string('berkas')->nullable();
            $table->integer('size')->nullable();
            $table->foreign('id_creator')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_community');
    }
};
