<!DOCTYPE html>
<html>
    <head>
        <title>Soumission d'une activité</title>
    </head>
    <body>
        <h1>Soumission d'une activité</h1>
        <p>
            Votre doctorant {{ $doctorant->user->name }} a soumis l'activité {{ $activity->title }} pour évaluation. <br>
           
            Pour avoir plus d'informations sur l'activité', connectez-vous à votre espace.
        </p>
        <p>
            Cordialement, 
        </p>
    </body>
</html>
