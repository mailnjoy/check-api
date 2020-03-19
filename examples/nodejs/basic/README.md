<h3 align="center">API partenaire de <span style="color:#95C11F;">Check by Mailnjoy<span></h3>

# NodeJs -  Exemple basique
Le fichier `basic.js` est un exemple extrêmement simple d'appel à l'API. Il ne fait aucun traitement à partir du résultat mais permet d'illustrer le fonctionnement du endpoint de validation unitaire

## Lancement
Renseigner les variables `mailnjoyId` et  `mailnjoySecret` dans le fichier `basic.js`.
A la racine, installer le projet
```bash
npm install
```
Puis l'exécuter 
```bash
npm start
```
Comme précisé, le résultat de l'appel API est disponible par défaut sur `http://127.0.0.1:8080`.

## Explications
L'appel API est ici statique, en mode `simple` et sur une adresse email statique.
Lors de l'appel, il faut bien préciser les headers d'authentification `mailnjoy-id` et `mailnjoy-secret`, sans oublier de renseigner le `Content-Type`.
