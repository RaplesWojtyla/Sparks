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
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sender');
            $table->unsignedBigInteger('id_receiver');
            $table->text('chat')->nullable();
            $table->string('berkas')->nullable();
            $table->integer('size')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('id_story')->nullable();
            $table->foreign('id_sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_receiver')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_story')->references('id')->on('story')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};