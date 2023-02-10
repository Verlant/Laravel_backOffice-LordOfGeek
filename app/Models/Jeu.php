<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    use HasFactory;
    protected $table = "jeux";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['titre', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, "pivot_tags"); // belongsToMany = many to many
    }
}
