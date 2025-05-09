<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recipe_id',
        'score',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public static function getTableName(): string
    {
        return (new self())->getTable();
    }
}
