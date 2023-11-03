<!DOCTYPE html>
<html>
    <head>
        <title>Ajout d'une nouvelle formation</title>
    </head>
    <body>
        <h1>Ajout d'une nouvelle formation</h1>
        <p>
            Bonjour <strong>{{ $doctorant->user->name }}</strong>.
        </p>
        <p>
            Une nouvelle formation a été ajouté à votre espace avec succès. <br>
            Voici quelques informations liées à cette formation :
            <ul>
                <li><strong>Intitulé :</strong> {{ $formation->title }}</li>
                <li><strong>Description :</strong> {{ $formation->description }}</li>
            </ul>
            Pour avoir plus d'informations sur la formation, connectez-vous à votre espace.
        </p>
        <p>
            Cordialement, 
        </p>
    </body>
</html>
