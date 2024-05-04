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
        Schema::create('tbl_file_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_post');
            $table->string('file_post');
            $table->string('berkas');
            $table->integer('size');
            $table->foreign('id_post')->references('id')->on('tbl_post')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_file_post');
    }
};
