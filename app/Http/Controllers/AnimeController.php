<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;

class AnimeController extends Controller
{
    // função de criar o anime com todos os dados
    public function store(Request $request) {
        $anime_creat = new Anime;
        $anime_creat->title = $request->title;
        $anime_creat->description = $request->description;
        $anime_creat->date = $request->date;
        $anime_creat->genero = $request->genero;

        
    // Validação da imagem
    if($request->hasFile('image') && $request->file('image')->isValid()){

        $request_image = $request->image;

        $extension = $request_image->extension();

        $image_name = md5($request_image->getClientOriginalName() . strtotime('now')) . '.' . $extension;

        $request->image->move(public_path('img/image_tumb'), $image_name);

        $anime_creat->image = $image_name;

    }

    // salva e retorna da raiz
    $anime_creat->save();

    return redirect('/')->with('msg', 'Anime criado com Sucesso');
    }

    // função que cuida de favoritar
    public function favoritar($id) {
        // pega o id do usuario autentificado junto com o id do anime
        $user = auth()->user();
        $anime = Anime::findOrFail($id);
    
        // Verificar se o usuário já favoritou este anime
        if ($user->animes()->where('anime_id', $id)->exists()) {
            return redirect('/')->with('msg', 'Você já favoritou este anime.');
        }
    
        // Se o usuario não favoritou o anime entao ele faz um vinculo com id do
        // usuario com o id do anime
        $user->animes()->attach($id);
    
        return redirect('/')->with('msg', 'Anime favoritado com sucesso.');
    }
    

    // função pra desfavoritar o anime
    public function leaveAnime($id) {
            // pega o usuario autentificado
            $user = auth()->user();
        
            // desvincula usuario com anime
            $user->animes()->detach($id);
        
            $anime = Anime::findOrFail($id);
        
            return redirect('/')->with('msg', 'Você desfavoritou o anime com sucesso ') . $anime->title;
    }

}
