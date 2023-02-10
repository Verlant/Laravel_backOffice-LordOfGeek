<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Jeu;
use App\Models\Tag;
use Illuminate\Http\Request;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jeux = Jeu::orderBy('id', "ASC")->get();
        return view('jeux.index', ['jeux' => $jeux]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jeux.create', ['message' => "Cette page je l'ai pas encore développée"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->validate([
            "nouveau-titre-jeu" => "required|string|max:45|min:5"
        ])) {
            $titre = $request->input("nouveau-titre-jeu");
            $jeu = new Jeu();
            $jeu->titre = $titre;
            $jeu->save();
            $id = $jeu->id;
            return redirect()->route("jeux.show", $id);
        } else {
            return redirect()->back();
            die;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jeu = Jeu::find($id);
        $categorie = $jeu->categorie;
        $tags = $jeu->tags;
        return view('jeux.show', ['id' => $id, 'jeu' => $jeu, 'categorie' => $categorie, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jeu = Jeu::find($id);
        $categories = Categorie::all();
        $tags = $jeu->tags;
        return view('jeux.edit', ['id' => $id, 'jeu' => $jeu, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->validate([
            "titre-jeu" => "required|string|max:45|min:5",
            "categorie_id-jeu" => "required | int"
        ])) {
            $titre = $request->input('titre-jeu');
            $categorie_id = $request->input("categorie_id-jeu");
            $jeu = Jeu::find($id);
            $jeu->titre = $titre;
            $jeu->categorie_id = $categorie_id;
            $jeu->save();
            return redirect()->route("jeux.index");
        } else {
            return redirect()->back();
            die;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Jeu::destroy($id);
        return redirect()->route("jeux.index");
    }

    /**
     * Attach a tag to a game.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function attach(Request $request, $id_jeu)
    {
        //TODO
        if ($request->validate([
            "nouveau_tag-jeu" => "required|string|max:45|min:1"
        ])) {
            $nom = $request->input("nouveau_tag-jeu");
            $tag = Tag::firstOrCreate([
                "nom" => $nom
            ]);
            $id_tag = $tag->id;
            $jeu = Jeu::find($id_jeu);
            if ($jeu->tags->contains($id_tag)) {
                // echo "Ce tag est déjà attaché à ce jeu.";
                // die;
                return redirect()->route("jeux.edit", $id_jeu);
            } else {
                $jeu->tags()->attach($id_tag);
                return redirect()->route("jeux.show", $id_jeu);
            }
        } else {
            echo "erreur";
            die;
        }
    }
}
