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
                Schema::dropIfExists('options');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->text('content')->nullable();
            $table->boolean('is_correct')->default(false);
            $table->foreign("question_id")->references("id")->onDelete("cascade")->on("questions");

            $table->timestamps();
        });
    }
};
