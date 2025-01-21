<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    // Définir la table associée
    protected $table = 'sales';

    // Définir les champs qui peuvent être remplis en masse (mass assignable)
    protected $fillable = [
        'seller_id',
        'buyer_id',
        'item_id',
        'price',
    ];

    // Définir les relations
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id'); // Relation avec le vendeur (user)
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id'); // Relation avec l'acheteur (user)
    }

    public function item()
    {
        return $this->belongsTo(Items::class); // Relation avec l'item vendu
    }

    // Si nécessaire, vous pouvez définir des casts pour certains types de données
    protected $casts = [
        'price' => 'double',
    ];
}
