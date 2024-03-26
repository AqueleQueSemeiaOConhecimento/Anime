<?php

namespace Database\Seeders;

use App\Models\Episodeo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpisodeosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Episodeo::create([
            'titulo' => 'Episodeo 1',
            'description' => 'muito bom esse episodeo não é segredo, melhor so se eu tivesse um emprego, daria mais valor ao tempo livre',
            'video' => 'rap.mp4',
            'anime_id' => 1
        ]);

        Episodeo::create([
            'titulo' => 'Episodeo 2',
            'description' => 'muito bom, não é segredo',
            'video' => 'rap.mp4',
            'anime_id' => 1
        ]);

        Episodeo::create([
            'titulo' => 'Episodeo 1',
            'description' => 'muito bom, não é segredo',
            'video' => 'rap.mp4',
            'anime_id' => 2
        ]);

        Episodeo::create([
            'titulo' => 'Episodeo 2',
            'description' => 'muito bom, não é segredo',
            'video' => 'rap.mp4',
            'anime_id' => 2
        ]);

    }
}
