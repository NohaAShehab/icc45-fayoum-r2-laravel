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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('github_id')->nullable()->after('email');
            $table->string("github_token")->nullable()->after('github_id');
            $table->string("github_refresh_token")->nullable()->after('github_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('github_id');
            $table->dropColumn('github_token');
            $table->dropColumn('github_refresh_token');
        });
    }
};
