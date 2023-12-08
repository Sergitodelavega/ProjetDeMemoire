<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenue sur notre plateforme</title>
    </head>
    <body>
        <h1>Bienvenue sur la Plateforme Numérique Doctorale de l'UAC</h1>
        <p>
            Bonjour <strong>{{ $doctorant->user->name }}</strong>.
        </p>
        <p>
            Votre compte doctorant a été créé avec succès. <br>
            Voici vos informations de connexion :
            <ul>
                <li><strong>Email :</strong> {{ $doctorant->user->email }}</li>
                <li><strong>Mot de passe :</strong> {{ $password }}</li>
            </ul>
        </p>
        <p>
            Veuillez cliquer sur ce <a href="<?php echo $link; ?>">lien</a>  pour vous connecter à votre espace membre.
        </p>
        <p>
            Cordialement, 
        </p>
    </body>
</html>
