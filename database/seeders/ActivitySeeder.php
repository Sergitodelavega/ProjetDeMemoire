<?php

namespace Database\Seeders;

use App\Models\Doctorant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Activity::factory()->create([
                'title' => 'Activité 1',
                'description' => 'Description de l\'activité 1',
                'status' => 'non soumis',
                'comment' => null,
                'doctorant_id' => 1, // ID du doctorant associé
        ]);
        \App\Models\Activity::factory()->create([
                'title' => 'Activité 2',
                'description' => 'Description de l\'activité 2',
                'status' => 'non soumis',
                'comment' => null,
                'doctorant_id' => 1, // ID du doctorant associé
    ]);
    \App\Models\Activity::factory()->create([
                'title' => 'Activité 3',
                'description' => 'Description de l\'activité 3',
                'status' => 'non soumis',
                'comment' => null,
                'doctorant_id' => 1, // ID du doctorant associé
    ]);

    }
}
