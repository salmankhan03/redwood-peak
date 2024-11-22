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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->text('title')->nullable();
            $table->text('category')->nullable();
            $table->text('content')->nullable();
            $table->boolean('is_enabled')->default(1);

            $table->text('file_name');
            $table->text('file_path');
            $table->text('size_in_kb');
            $table->text('extension');

            $table->bigInteger('created_by');
            $table->bigInteger('edited_by')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
