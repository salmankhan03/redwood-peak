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
        Schema::create('post_media', function (Blueprint $table) {
            $table->dropColumn('file_name');
            $table->dropColumn('file_path');
            $table->dropColumn('size_in_kb');
            $table->dropColumn('extension');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('post_media', function (Blueprint $table) {
            $table->text('file_name');
            $table->text('file_path');
            $table->text('size_in_kb');
            $table->text('extension');        
        
        });
    }
};
