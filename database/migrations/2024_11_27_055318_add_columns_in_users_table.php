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

            $table->boolean('send_user_notification')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('role_id')->nullable();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('send_user_notification');
            $table->dropColumn('status');
            $table->dropColumn('role_id');
            
            $table->dropSoftDeletes();


        });
    }
};