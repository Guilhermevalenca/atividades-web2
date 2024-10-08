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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')
                ->references('id')
                ->on('authors')
                ->cascadeOnDelete();
            $table->foreignId('publisher_id')
                ->nullable()
                ->references('id')
                ->on('publishers')
                ->onDelete('set null');
            $table->integer('published_year')
                ->nullable();
            $table->string('cover')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
