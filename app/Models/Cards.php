<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    // Définir la table associée
    protected $table = 'cards';

    // Définir les champs qui peuvent être remplis en masse (mass assignable)
    protected $fillable = [
        'rarity',
        'item_id',
    ];

    // Définir les relations
    public function item()
    {
        return $this->belongsTo(Item::class); // Relation avec l'item
    }

    // Si nécessaire, vous pouvez définir des casts pour certains types de données
    protected $casts = [
        'created_at' => 'datetime', // Cast pour la gestion des dates
        'updated_at' => 'datetime', // Cast pour la gestion des dates
    ];
}
