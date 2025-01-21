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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_description');
            $table->string('item_language');
            $table->string('item_serie');
            $table->double('item_price', 15, 8);
            $table->enum('item_quality',['poor','fair','good','very good','excellent','mint','gem mint']);
            $table->boolean('item_grading');
            $table->timestamp('item_acquired_date')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Clé étrangère vers la table users
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
