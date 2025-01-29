<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('health_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->decimal('blood_sugar')->nullable();
            $table->decimal('hba1c')->nullable();
            $table->decimal('weight')->nullable();
            $table->string('oxygen')->nullable();
            $table->string('tension')->nullable();
            $table->string('dates')->nullable();
            $table->date('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_indicators');
    }
};
