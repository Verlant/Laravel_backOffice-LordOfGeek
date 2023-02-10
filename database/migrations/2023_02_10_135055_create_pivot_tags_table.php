<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_tags', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->unsignedBigInteger("jeu_id"); // crée colonne jeu_id en bigint (fk)
            $table->unsignedBigInteger("tag_id"); // crée colonne tag_id en bigint (fk)
            // Associe la colonne jeu_id a l'id de la table jeux
            $table->foreign("jeu_id")->references("id")->on("jeux");
            $table->foreign("tag_id")->references("id")->on("tags");
            $table->primary(["jeu_id", "tag_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_tags');
    }
};
