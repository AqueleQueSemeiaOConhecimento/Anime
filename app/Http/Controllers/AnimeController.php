<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;

class AnimeController extends Controller
{
    public function store(Request $request) {
        $anime_creat = new Anime;
        $anime_creat->title = $request->title;
        $anime_creat->description = $request->description;
        $anime_creat->date = $request->date;
        $anime_creat->genero = $request->genero;

        
    // Image Upload
    if($request->hasFile('image') && $request->file('image')->isValid()){

        $request_image = $request->image;

        $extension = $request_image->extension();

        $image_name = md5($request_image->getClientOriginalName() . strtotime('now')) . '.' . $extension;

        $request->image->move(public_path('img/image_tumb'), $image_name);

        $anime_creat->image = $image_name;

    }

    $anime_creat->save();

    return redirect('/')->with('msg', 'Anime criado com Sucesso');
    }

    public function favoritar($id) {

        $user = auth()->user();

        $user->animes()->attach($id);

        $anime = Anime::findOrFail($id);

        return redirect('/');
    }

}
