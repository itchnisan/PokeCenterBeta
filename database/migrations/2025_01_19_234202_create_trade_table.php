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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->enum('trade_status', [
                'nothing',
                'pending',
                'confirmed',
                'declined',
                'in delivery',
                'rejected',
                'finish'
            ])->default('nothing');
            $table->foreignId('initiator_item_id')
                  ->constrained('items')
                  ->onDelete('cascade'); // Item de l'utilisateur initiateur
            $table->foreignId('receiver_item_id')
                  ->constrained('items')
                  ->onDelete('cascade'); // Item de l'utilisateur receveur
            $table->foreignId('initiator_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Item de l'utilisateur initiateur
            $table->foreignId('receiver_id')
                  ->constrained('users')
                  ->onDelete('cascade'); // Item de l'utilisateur receveur
            $table->timestamp('trade_date')->nullable(); // Date de l'échange
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
