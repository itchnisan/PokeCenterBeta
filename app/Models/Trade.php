<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    // Définir la table associée
    protected $table = 'trade';

    // Définir les champs qui peuvent être remplis en masse (mass assignable)
    protected $fillable = [
        'trade_status',
        'initiator_id',
        'receiver_id',
        'trade_date',
    ];

    // Définir les relations
    public function initiator()
    {
        return $this->belongsTo(User::class, 'initiator_id'); // Relation avec l'utilisateur initiateur
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id'); // Relation avec l'utilisateur receveur
    }

    const trade_status = ['nothing','pending','confirmed','declined','in delivery','rejected','finish'];
    // Si nécessaire, vous pouvez définir des casts pour certains types de données
    protected $casts = [
        'status' => 'string',
    ];
}
