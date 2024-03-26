<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anime;

class AnimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Anime::create([
            'title' => 'Dragona Ball',
            'description' => 'Simplesmente Divino',
            'date' => '2024-03-26',
            'genero' => json_encode(['Comédia', 'Ação']),
            'image' => 'dragonball.png',
        ]);

        Anime::create([
            'title' => 'Onea Piece',
            'description' => 'Ixi, muito texto zé',
            'date' => '2024-03-26',
            'genero' => json_encode(['Comédia', 'Ação']),
            'image' => 'onepiece.png',
        ]);
    }
}
