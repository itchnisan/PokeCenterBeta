<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //id_trade	id_user_from	id_user_to	id_item	trade_date	status
    public function up(): void
    {
        Schema::create('trade', function (Blueprint $table) {
            $table->id();
            $table->enum('trade_status',['nothing','pending','confirmed','declined','in delivery','rejected','finish'])->default('nothing');
            $table->foreignId('initiator_item_id')->constrained('items')->onDelete('cascade'); // item de Utilisateur initiateur
            $table->foreignId('receiver_item_id')->constrained('items')->onDelete('cascade'); // item de Utilisateur receveur
            $table->timestamps('trade_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade');
    }
};
