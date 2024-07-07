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
        Schema::create('recap_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recap_id');
            $table->foreignId('participant_id');
            $table->integer('score_1')->nullable();
            $table->integer('score_2')->nullable();
            $table->integer('score_3')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recap_details');
    }
};
