<?php
// config/spaces.php

return [
    'doctorant' => [
        ['url' => 'doctorant.home', 'label' => 'Accueil'],
        ['url' => 'doctorant.index', 'label' => 'Liste des doctorants'],
        // Ajoutez ici d'autres liens spécifiques aux doctorants
    ],
    'encadreur' => [
        ['url' => 'encadreur.home', 'label' => 'Accueil'],
        ['url' => 'doctorant.index', 'label' => 'Liste des encadreurs'],
        // Ajoutez ici d'autres liens spécifiques aux encadreurs
    ],
    'admin' => [
        ['url' => 'admin.home', 'label' => 'Accueil'],
        ['url' => 'admin.index', 'label' => 'Liste des admin'],
        // Ajoutez ici d'autres liens spécifiques aux doctorants
    ],

];