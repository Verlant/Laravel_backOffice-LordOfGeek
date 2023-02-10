<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nom'];

    public function jeux()
    {
        return $this->belongsToMany(Jeu::class, "pivot_tags");
    }
}
