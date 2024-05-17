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
        Schema::table('notification', function (Blueprint $table) {
            $table->unsignedBigInteger('id_post')->nullable()->after('id_users');
            $table->unsignedBigInteger('id_story')->nullable()->after('id_post');

            $table->foreign('id_post')->references('id')->on('post')->onDelete('cascade');
            $table->foreign('id_story')->references('id')->on('story')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notification', function (Blueprint $table) {
            $table->dropForeign('notification_id_post_foreign');
            $table->dropForeign('notification_id_story_foreign');
        });
    }
};
