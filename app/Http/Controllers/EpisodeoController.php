<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;
use App\Models\Episodeo;

class EpisodeoController extends Controller
{
    public function episodeos_anime($id) {
        $anime = Anime::findOrFail($id);
        return view('/episodeos', ['anime' => $anime]);
    }

    public function form_ep($id) {
        $anime = Anime::findOrFail($id);
        return view('/crud_episodeo', ['anime' => $anime]);
    }

    public function adicionar_episodeo(Request $request){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'video' => 'required|file|mimes:mp4,mov,avi|max:100240', // ajuste o tamanho do vídeo conforme necessário
            'anime_id' => 'required|exists:animes,id',
        ]);


        $episodeo = new Episodeo();
        $episodeo->title = $request->title;
        $episodeo->description = $request->description;

        if($request->hasFile('video') && $request->file('video')->isValid()){

            $request_video = $request->file('video');
    
            $extension = $request_video->extension();
    
            $episodeo_nome = md5($request_video->getClientOriginalName() . strtotime('now')) . '.' . $extension;
    
            $request->file('video')->move(public_path('img/episodeos'), $episodeo_nome);
    
            $episodeo->episodeo = $episodeo_nome;
        }

        $anime = Anime::findOrFail($request->anime_id);
        $anime->episodeos()->save($episodeo);

        return redirect('/')->with('msg', 'Sucesso em adicionar episodeo');
    }
}
