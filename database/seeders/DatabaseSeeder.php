<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorie;
use App\Models\Jeu;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Tag::factory(50)->create();
        Categorie::factory(10)->create();
        Jeu::factory(10)->create();

        $jeux = Jeu::all();
        foreach ($jeux as $jeu) {
            // Ici tags() est une méthode créé par le framework renvoyant un objet
            $jeu->tags()->attach('1'); //attach pour ajouter, detach pour enlever
        }
    }
}
