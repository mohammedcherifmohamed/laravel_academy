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
        Schema::create('course_overview', function (Blueprint $table) {
            $table->id();
            $table->string('duration')->nullable();
            $table->string('lessons')->nullable();
            $table->enum('level',['beginner','intermediate','advanced'])->nullable();
            $table->string('requirements')->nullable();
            $table->string('old_price')->nullable();
            $table->string('will_learn')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('course')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_overview', function (Blueprint $table) {
           Schema::dropIfExists('course_overview');

        });
    }
};
