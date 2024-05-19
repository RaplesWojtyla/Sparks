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
            // $table->dropColumn('id_following');

            $table->unsignedBigInteger('id_following')->nullable()->after('id_story');
            $table->foreign('id_following')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notification', function (Blueprint $table) {
            $table->dropForeign('notification_id_following_foreign');
            $table->dropColumn('id_following');
        });
    }
};
