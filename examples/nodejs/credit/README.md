<h3 align="center">API partenaire de <span style="color:#95C11F;">Check by Mailnjoy<span></h3>

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
