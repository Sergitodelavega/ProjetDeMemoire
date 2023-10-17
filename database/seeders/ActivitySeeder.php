<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Doctorant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    protected $doctorantId, $year;

    public function __construct($doctorantId, $year)
    {
        $this->doctorantId = $doctorantId;
        $this->year = $year;
    }

    public function run()
    {
        if($this->year == 1){
            $activity = new Activity([
                'title' => 'Revue de littérature initiale',
                'description' => 'Réaliser une première revue de la littérature sur le sujet de recherche',
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S1',
            ]);
            $activity->delai = 12;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => 'Préparation du plan de recherche initial',
                'description' => 'Élaborer un plan de recherche initial avec des objectifs et une méthodologie',
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S1',
            ]);
            $activity->delai = 30;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => 'Inscription aux cours de formation',
                'description' => 'S\'\inscrire aux cours de formation requis pour la thèse',
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S2',
            ]);
            $activity->delai = 60;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => "Rapport annuel d'avancement (1re année)",
                'description' => "Soumettre un rapport annuel d'avancement des travaux de recherche de la première année",
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S2',
            ]);
            $activity->delai = 90;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();
        } 
        elseif($this->year == 2){
            $activity = new Activity([
                'title' => 'Collecte de données',
                'description' => 'Commencer la collecte de données pour la recherche',
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S3',
            ]);
            $activity->delai = 30;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => 'Analyse préliminaire des données',
                'description' => 'Effectuer une analyse préliminaire des données collectées',
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S3',
            ]);
            $activity->delai =60;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => "Rédaction de l'article de revue",
                'description' => "Commencer la rédaction de l'article de revue",
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S4',
            ]);
            $activity->delai = 90;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => "Rapport annuel d'avancement (2e année)",
                'description' => "Soumettre un rapport annuel d'avancement des travaux de recherche de la deuxième année",
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S4',
            ]);
            $activity->delai = 120;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();
        } 
        elseif ($this->year == 3){
            $activity = new Activity([
                'title' => 'Finalisation de la collecte de données',
                'description' => ' Compléter la collecte de données pour la recherche',
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S5',
            ]);
            $activity->delai = 60;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => 'Analyse avancée des données',
                'description' => 'Effectuer une analyse approfondie des données collectées',
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S5',
            ]);
            $activity->delai =120;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => "Rédaction de la thèse",
                'description' => "Commencer la rédaction de la thèse",
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S6',
            ]);
            $activity->delai = 240;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => "Rapport annuel d'avancement (3e année)",
                'description' => "Soumettre un rapport annuel d'avancement des travaux de recherche de la troisième année",
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S6',
            ]);
            $activity->delai = 270;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();

            $activity = new Activity([
                'title' => "Préparation de la défense de thèse",
                'description' => "Préparer la défense de thèse, y compris la rédaction de la présentation et la planification de la soutenance",
                'status' => 'non soumis',
                'comment' => null,
                'semestre' => 'S6',
            ]);
            $activity->delai = 300;
            $activity->doctorant_id = $this->doctorantId;
            $activity->year_id = $this->year;
            $activity->save();
        } 
        else{
            echo "Pas d'activités crées";
        }
    } 
}
