<!DOCTYPE html>
<html>
    <head>
        <title>Définition du projet de thèse</title>
    </head>
    <body>
        <h1>Définition du projet de thèse</h1>
        <p>
            Bonjour <strong>{{ $doctorant->user->name }}</strong>.
        </p>
        <p>
            Le sujet du projet de thèse a été défini avec succès. <br>
            Voici les informations liées à la thèse :
            <ul>
                <li><strong>Sujet :</strong> {{ $these->title }}</li>
                <li><strong>Description :</strong> {{ $these->description }}</li>
            </ul>
        </p>
        <p>
            Cordialement, 
        </p>
    </body>
</html>
