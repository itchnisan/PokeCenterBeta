<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'user_id',
    ];

    // Relation avec la table users
    public function user()
    {
        return $this->belongsTo(User::class); // Relation avec la table users
    }

    // Constantes pour item_quality
    const item_quality = [
        'poor', 'fair', 'good', 'very good', 'excellent', 'mint', 'gem mint'
    ];

    // Casts des types de données
    protected $casts = [
        'item_acquired_date' => 'datetime',
        'item_price' => 'double',
    ];

    // Récupérer les items d'un utilisateur en utilisant le Query Builder
    public static function getUserItems(int $userId)
    {
        return DB::table('items')
            ->where('user_id', $userId)
            ->get();
    }

    // Récupérer les items par qualité en utilisant le Query Builder
    public static function getItemsByQuality(string $quality)
    {
        return DB::table('items')
            ->where('item_quality', $quality)
            ->get(); 
    }

    // Ajouter un item en utilisant le Query Builder
    public static function addItem(array $data)
    {
        return DB::table('items')->insert($data);
    }

    // Mettre à jour un item en utilisant le Query Builder
    public static function updateItem(int $itemId, array $data)
    {
        return DB::table('items')
            ->where('id', $itemId)
            ->update($data); 
    }

    // Supprimer un item en utilisant le Query Builder
    public static function deleteItem(int $itemId)
    {
        return DB::table('items')
            ->where('id', $itemId)
            ->delete();
    }
}
