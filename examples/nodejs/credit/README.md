<h3 align="center"><span style="color:#95C11F;">Check by Mailnjoy<span> API</h3>

# NodeJs - Basic example
The `index.php` file is an extremely simple example of a call to the credit API. It does not process the result, but illustrates how the credit retrieval endpoint works.

## Prerequisites
Node.js must be installed: [Download Node](https://nodejs.org/en/download/)

## Launch
Set the `mailnjoyId` and `mailnjoySecret` variables in the `basic.js` file.
At the root of the folder (`check-api/examples/nodejs/credit`), launch installation of the project
```bash

npm install
```

Then run it 
```bash
npm start

```

As specified, the result of the API call is available by default at `http://127.0.0.1:8080`.

## Explanations
The API call here is static.
When making the call, the `mailnjoy-id` and `mailnjoy-secret` authentication headers must be specified.

----

# NodeJs -  Exemple basique
Le fichier `index.php` est un exemple extrêmement simple d'appel à l'API crédit. Il ne fait aucun traitement à partir du résultat mais permet d'illustrer le fonctionnement du endpoint de récupération des crédits.

## Prérequis
Node.js doit être installé: [Télecharger Node](https://nodejs.org/en/download/)

## Lancement
Renseigner les variables `mailnjoyId` et  `mailnjoySecret` dans le fichier `basic.js`.

A la racine du dossier (`check-api/examples/nodejs/credit`), lancer l'installation le projet
```bash
npm install
```
Puis l'exécuter 
```bash
npm start
```
Comme précisé, le résultat de l'appel API est disponible par défaut sur `http://127.0.0.1:8080`.

## Explications
L'appel API est ici statique.
Lors de l'appel, il faut bien préciser les headers d'authentification `mailnjoy-id` et `mailnjoy-secret`.
