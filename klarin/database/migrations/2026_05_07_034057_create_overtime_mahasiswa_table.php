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
        Schema::create('overtime_mahasiswa', function (Blueprint $table) {
            $table->id();
            // Pastikan baris ini ada dan tulisannya benar (overtime_id)
            $table->foreignId('overtime_id')->constrained('overtimes')->onDelete('cascade');
            // Pastikan baris ini ada dan tulisannya benar (mahasiswa_id)
            $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
            
            $table->enum('status', ['progress', 'selesai'])->default('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtime_mahasiswa');
    }
};
