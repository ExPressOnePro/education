<?php

namespace Database\Seeders;

use App\Models\slide;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        slide::create([
            'title' => 'Title editați textul',
            'content' => 'Încărcați, editați textul și adăugați propria fotografie de fundal pe ecran complet pentru a o face a dvs.',
            'photo' => 'uploads/slide_1.jpg',
        ]);
        slide::create([
            'title' => 'Title editați textul',
            'content' => 'Încărcați, editați textul și adăugați propria fotografie de fundal pe ecran complet pentru a o face a dvs.',
            'photo' => 'uploads/slide_2.jpg',
        ]);
        slide::create([
            'title' => 'Title editați textul',
            'content' => 'Încărcați, editați textul și adăugați propria fotografie de fundal pe ecran complet pentru a o face a dvs.',
            'photo' => 'uploads/slide_3.jpg',
        ]);
    }
}
