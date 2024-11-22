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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->text('type')->nullable();
            $table->text('year')->nullable();
            $table->boolean('is_enabled')->default(1);  

            $table->text('file_name')->nullable();
            $table->text('file_path')->nullable();
            $table->text('file_extension')->nullable();
            $table->text('size_in_kb')->nullable();

            $table->bigInteger('created_by');
            $table->bigInteger('edited_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
