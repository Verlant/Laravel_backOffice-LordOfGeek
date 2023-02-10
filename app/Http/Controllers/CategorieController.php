<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $categories = Categorie::all();
        $categories = Categorie::orderBy('id', "ASC")->get();
        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create', ['message' => "Cette page je l'ai pas encore développée"]);
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
            "nouveau-libelle-categorie" => "required|string|max:45|min:5"
        ])) {
            $libelle = $request->input("nouveau-libelle-categorie");
            $categorie = new Categorie();
            $categorie->libelle = $libelle;
            $categorie->save();
            $id = $categorie->id;
            return redirect()->route("categories.show", $id);
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
        $categorie = Categorie::find($id);
        $jeux = $categorie->jeux;
        return view('categories.show', ['id' => $id, 'categorie' => $categorie, 'jeux' => $jeux]);
    }

    // $jeu = Jeu::find($id);
    // return view('jeux.show', ['id' => $id, 'jeu' => $jeu]);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categorie = Categorie::find($id);
        return view('categories.edit', ['id' => $id, 'categorie' => $categorie]);
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
            "libelle-categorie" => "required|string|max:45|min:5"
        ])) {
            $libelle = $request->input("libelle-categorie");
            $categorie = Categorie::find($id);
            $categorie->libelle = $libelle;
            $categorie->save();
            return redirect()->route("categories.index");
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
        Categorie::destroy($id);
        return redirect()->route("categories.index");
    }
}
