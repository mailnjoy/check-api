<h3 align="center">API partenaire de <span style="color:#95C11F;">Check by Mailnjoy<span></h3>

# PHP -  Exemple basique
Le fichier `index.php` est un exemple extrêmement simple d'appel à l'API. Il ne fait aucun traitement à partir du résultat mais permet d'illustrer le fonctionnement du endpoint de validation unitaire

## Lancement
Renseigner les constantes `MAILNJOY_ID` et  `MAILNJOY_SECRET` dans le fichier `index.php`.
Il suffit alors de se rendre requêter la racine du dossier pour lancer l'appel à l'API.

## Explications
L'appel API est ici statique, en mode `simple` et sur une adresse email fixe.
On utilise la bibliothe CURL: https://www.php.net/manual/fr/book.curl.php
Lors de l'appel, il faut bien préciser les headers d'authentification `mailnjoy-id` et `mailnjoy-secret`, sans oublier de renseigner le `Content-Type`.