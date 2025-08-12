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
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('description');
            $table->string('image_path');
            $table->double('price');

            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('instructor_id')->references('id')->on('instructor')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
