<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $tags = Tag::all();
        $tags = Tag::orderBy('id', "ASC")->get();
        return view('tags.index', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create', ['message' => "Cette page je l'ai pas encore développée"]);
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
            "nouveau-nom-tag" => "required|string|max:45|min:5"
        ])) {
            $nom = $request->input("nouveau-nom-tag");
            $tag = new Tag();
            $tag->nom = $nom;
            $tag->save();
            $id = $tag->id;
            return redirect()->route("tags.show", $id);
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
        $tag = Tag::find($id);
        $jeux = $tag->jeux;
        return view('tags.show', ['id' => $id, 'tag' => $tag, "jeux" => $jeux]);
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
        $tag = Tag::find($id);
        return view('tags.edit', ['id' => $id, 'tag' => $tag]);
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
            "nom-tag" => "required|string|max:45|min:5"
        ])) {
            $nom = $request->input("nom-tag");
            $tag = Tag::find($id);
            $tag->nom = $nom;
            $tag->save();
            return redirect()->route("tags.index");
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
        Tag::destroy($id);
        return redirect()->route("tags.index");
    }
}
