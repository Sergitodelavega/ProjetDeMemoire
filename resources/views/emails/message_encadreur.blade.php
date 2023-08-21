<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenue sur notre plateforme</title>
    </head>
    <body>
        <h1>Bienvenue sur notre plateforme</h1>
        <p>
            Bonjour <strong>{{ $encadreur->user->name }}</strong>.
        </p>
        <p>
            Votre compte encadreur a été créé avec succès. <br>
            Voici vos informations de connexion :
            <ul>
                <li><strong>Email :</strong> {{ $encadreur->user->email }}</li>
                <li><strong>Mot de passe :</strong> {{ $encadreur->user->password }}</li>
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