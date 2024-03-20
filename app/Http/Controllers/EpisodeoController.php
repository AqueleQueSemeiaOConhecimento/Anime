<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;
use App\Models\Episodeo;
use App\Http\Controllers\RotasController;

class EpisodeoController extends Controller
{
    // retorna rota de episodeos do anime
    public function episodeos_anime($id) {
        $anime = Anime::findOrFail($id);
        $episodeos = $anime->episodeos;
        return view('/episodeos', ['anime' => $anime, 'episodeos' => $episodeos]);
    }

    // link que leva pro formulario de criação do episodeo
    public function form_ep($id) {
        $episodio = Episodeo::findOrFail($id);
        return view('/crud_episodeo', ['episodio' => $episodio]);
    }

    // formularo de adicionar episodeo
    public function adicionar_episodeo(Request $request){
     
        $episodeo = new Episodeo();
        $episodeo->titulo = $request->titulo;
        $episodeo->description = $request->description;

        if($request->hasFile('video') && $request->file('video')->isValid()){

            $request_video = $request->file('video');
    
            $extension = $request_video->extension();
    
            $episodeo_nome = md5($request_video->getClientOriginalName() . strtotime('now')) . '.' . $extension;
    
            $request->file('video')->move(public_path('img/episodeos'), $episodeo_nome);
    
            $episodeo->video = $episodeo_nome;
        }

        $anime = Anime::findOrFail($request->anime_id);
        $anime->episodeos()->save($episodeo);

        return redirect('/')->with('msg', 'Sucesso em adicionar episodeo');
    }

    // deleto o anime
    public function delete_episodeo($id) {
        Episodeo::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Episodio excluido com sucesso!');
    }

    // retorna a view onde edito o anime
    public function edit_episodeo($id) {
        $episodio = Episodeo::findOrFail($id);

        return view('edit', ['episodio' => $episodio]);
    }


    // Update dos arquivos
    public function update(Request $request) {
        $data = $request->all();

        if($request->hasFile('video') && $request->file('video')->isValid()){

            $request_video = $request->file('video');
    
            $extension = $request_video->extension();
    
            $episodeo_nome = md5($request_video->getClientOriginalName() . strtotime('now')) . '.' . $extension;
    
            $request->file('video')->move(public_path('img/episodeos'), $episodeo_nome);
    
            $data['video'] = $episodeo_nome;
        }

        Episodeo::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Anime editado com sucesso!');

    }

}


