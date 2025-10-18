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
        Schema::table('course', function (Blueprint $table) {
            $table->unsignedBigInteger('quize_type')->nullable();
            $table->foreign('quize_type')->references('id')->on('quizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course', function (Blueprint $table) {
                        $table->dropForeign(['quize_type']);

            $table->dropColumn('quize_type');
        });
    }
};
