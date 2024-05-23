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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->foreignId('category_id');
            $table->foreignId('flight_id');
            $table->string('chest_no')->unique();
            $table->integer('number');
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->comment('0 : baru, 1 : pembayaran terverifikasi; 2 : hadir')->default(0);
            $table->string('trx_number')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
