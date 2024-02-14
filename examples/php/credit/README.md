<h3 align="center"><span style="color:#95C11F;">Check by Mailnjoy<span> API</h3>

# PHP - Credit example
The `index.php` file is an extremely simple example of a call to the credit API. It does not process the result, but illustrates how the credit retrieval endpoint works.

## Launch
Set the `MAILNJOY_ID` and `MAILNJOY_SECRET` constants in the `index.php` file.
Then simply request the root folder to launch the API call.

## Explanations
The API call here is static.
The CURL library is used: https://www.php.net/manual/fr/book.curl.php
When calling the API, the `mailnjoy-id` and `mailnjoy-secret` authentication headers must be specified.

---

# PHP -  Exemple crédit
Le fichier `index.php` est un exemple extrêmement simple d'appel à l'API crédit. Il ne fait aucun traitement à partir du résultat mais permet d'illustrer le fonctionnement du endpoint de récupération des crédits.

## Lancement
Renseigner les constantes `MAILNJOY_ID` et  `MAILNJOY_SECRET` dans le fichier `index.php`.
Il suffit alors de se rendre requêter la racine du dossier pour lancer l'appel à l'API.

## Explications
L'appel API est ici statique.
On utilise la bibliothe CURL: https://www.php.net/manual/fr/book.curl.php
Lors de l'appel, il faut bien préciser les headers d'authentification `mailnjoy-id` et `mailnjoy-secret`.