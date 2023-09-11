<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Activity::class;
    
    public function definition(): array
    {
        return [
            [
                'title' => 'Activité 1',
                'description' => 'Description de l\'activité 1',
                'status' => 'non soumis',
                'comment' => null,
                'doctorant_id' => 1, // ID du doctorant associé
            ], 
            [
                'title' => 'Activité 2',
                'description' => 'Description de l\'activité 2',
                'status' => 'non soumis',
                'comment' => null,
                'doctorant_id' => 1, // ID du doctorant associé
            ], 
            [
                'title' => 'Activité 3',
                'description' => 'Description de l\'activité 3',
                'status' => 'non soumis',
                'comment' => null,
                'doctorant_id' => 1, // ID du doctorant associé
            ], 

        ];
    }
}
