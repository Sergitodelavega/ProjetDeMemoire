<!DOCTYPE html>
<html>
    <head>
        <title>Activité validée avec succès</title>
    </head>
    <body>
        <h1>Activité validée avec succès</h1>
        <p>
            Votre activité {{ $activity->title }} a validé  avec succès avec le commentaire ci-dessous : <br>
            {{ $comments }} pour évaluation. <br>
           
            Pour avoir plus d'informations sur l'activité', connectez-vous à votre espace.
        </p>
        <p>
            Cordialement, 
        </p>
    </body>
</html>
