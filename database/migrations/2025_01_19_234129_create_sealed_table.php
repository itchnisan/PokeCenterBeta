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
        Schema::create('sealed', function (Blueprint $table) {
            $table->id();
            $table->enum('sealed_quality',[''])
            $table->foreignId('item_id')->constrained()->onDelete('cascade'); 
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sealed');
    }
};
