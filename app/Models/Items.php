<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    // Définir la table associée
    protected $table = 'items';

    // Définir les champs qui peuvent être remplis en masse (mass assignable)
    protected $fillable = [
        'item_name',
        'item_description',
        'item_language',
        'item_serie',
        'item_price',
        'item_quality',
        'item_grading',
        'item_acquired_date',
        'trade_id',
        'user_id',
    ];

    // Définir les relations
    public function trade()
    {
        return $this->belongsTo(Trade::class); // Relation avec la table trade
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Relation avec la table users
    }

    // Si vous avez des valeurs spécifiques pour item_quality, vous pouvez les définir ici
    const item_quality = [
        'poor', 'fair', 'good', 'very good', 'excellent', 'mint', 'gem mint'
    ];

    // Si nécessaire, vous pouvez définir des casts pour certains types de données
    protected $casts = [
        'item_acquired_date' => 'datetime',
        'item_price' => 'double',
    ];
}
