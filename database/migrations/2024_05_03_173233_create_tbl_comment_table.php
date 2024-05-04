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
        Schema::create('tbl_comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_commenter');
            $table->unsignedBigInteger('id_post')->nullable();
            $table->text('comment');
            $table->unsignedBigInteger('id_parent_commenter')->nullable();
            $table->foreign('id_post')->references('id')->on('tbl_post')->onDelete('cascade');
            $table->foreign('id_commenter')->references('id')->on('tbl_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_comment');
    }
};
