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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade'); // Vendeur
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');  // Acheteur
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');  // Item vendu
            $table->double('price', 15, 8); // Prix de vente
            $table->timestamps('sale_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
