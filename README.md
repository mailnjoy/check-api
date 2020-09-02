<p align="center">
  <img src="https://raw.githubusercontent.com/mailnjoy/api/master/public/images/mailnjoy_logo.png" alt="Logo" width="280" height="200">

  <h3 align="center">API partenaire de <span style="color:#95C11F;">Check by Mailnjoy<span></h3>

  <p align="center">
    Check by Mailnjoy est une solution de validation d'adresses email. <br/>L'API partenaire permet d'accèder aux services de Check, de façon simple, automatisée et sécurisée.
    <br />
    <a href="https://github.com/mailnjoy/check-api/wiki"><strong>Parcourir la documentation</strong></a>
  </p>
</p>

## Table des matières

* [À propos de Mailnjoy](#à-propos-de-mailnjoy)
  * [Qu'est-ce que Mailnjoy]()
  * [Devenir un bêta-testeur]()
* [QuickStart](#quickstart)
  * [Prérequis](#prerequis)
  * [Validation unitaire](#validation-unitaire)
  * [Validation de masse](#validation-en-masse)
* [Aller plus loin](#aller-plus-loin)
* [Roadmap](#roadmap)
* [Contact](#contact)
* [Licence](#licence)


## À propos de Mailnjoy
### TODO: Introduction commerciale / résumé 
### TODO: Contact / devenir bêta-testeur

## QuickStart

Suivez les étapes adaptées à votre cas d'usage (validation d'un seul mail / de nombreux mails). Dans tous les cas, vous devrez commencer par satisfaire les prérequis.

### Prérequis

Chaque appel à l'API se fait en étant authentifié par un couple identifiant/secret. Pour obtenir un accès à l'API, vous devez créer une clé de développeur, via le [site dédié aux developpeurs: `https://developer.mailnjoy.com`](https://developer.mailnjoy.com)

Une fois authentifié, il faut se rendre dans l'onglet [`Comptes API`](https://developer.mailnjoy.com/page-api-user)

![Onglet Comptes API](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/comptes_api.png)

Sur cette page, vous pouvez créer de nouvelles clés, en précisant:
 * Le nom de la clé
 * Si la clé peut faire des modifications ou non sur vos données (ce paramétre sera utile pour les futures fonctionnalités)
 * Si la clé peut dépenser des crédits (autoriser les achats), ce paramètre doit être activé pour pouvoir valider des adresses emails, car cette action consomme des crédits.

![Création de clé](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/creation_cle_api.png)

Vous pouvez également consulter les clés déjà existantes et récupérer les couples id/secret dans la section suivante

![Consultation des clés existantes](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/liste_cles_api.png)

Enfin, en cliquant sur le bouton à droite de la clé, vous accéder aux détails de la clé, tels que l'id, le secret ou la date de création de la clé.

![Détail d'une clé](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/detail_cle_api.png)

Vous avez également la possibilité de **supprimer la clé**. Attention, **cette action est définitive**, vous ne pourrez plus récupérer cette clé par la suite.

### Validation unitaire
Tous les exemples sont disponibles dans le dossier [`examples`](https://github.com/mailnjoy/check-api/tree/master/examples)

####  Node.js
Définissez vos credentials et l'url de l'API de validation unitaire
```javascript
const mailnjoyId = "myId"
const mailnjoySecret = "mySecret"
const mailnjoyUnitaryPath = "https://api.mailnjoy.com/v1/unitary"
```
On peut ensuite effectuer l'appel (ici en utilisant le client http [axios](https://github.com/axios/axios))
```javascript
axios.post(
  mailnjoyUnitaryPath + "?type=simple", // on fait ici une validation simple
  "example.address@somedomain.com", // l'adresse email que vous souhaitez valider
  {
    "headers": { // on précise dans les headers les credentials et le type de la payload
      "mailnjoy-id": mailnjoyId,
      "mailnjoy-secret": mailnjoySecret ,
      "Content-Type": "text/plain"
    }
  }
).then(result => {
  console.log(result.data)
}).catch(error => {
  console.log(error)
})
```
L'exemple complet est disponible [ici](https://github.com/mailnjoy/check-api/tree/master/examples/nodejs/basic/)
#### php
Définissez vos credentials et l'url de l'API de validation unitaire
```php
define("MAILNJOY_ID","myId");
define("MAILNJOY_SECRET","mySecret");
define("MAILNJOY_SERVER","https://api.mailnjoy.com/");
```
On peut ensuite effectuer l'appel (ici en utilisant le client http [CURL](https://www.php.net/manual/fr/book.curl.php))
```php
$curl = curl_init();

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "example.address@somedomain.com");
curl_setopt($curl, CURLOPT_URL, MAILNJOY_SERVER."v1/unitary/?type=simple"); // on fait ici une validation simple
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// on précise dans les headers les credentials et le type de la payload
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
  "mailnjoy-id: ".MAILNJOY_ID,
  "mailnjoy-secret: ".MAILNJOY_SECRET,
  "Content-Type: text/plain"
));

$result = curl_exec($curl);
if(!$result) {
  echo curl_error($curl);
} else {
  print_r(json_decode($result,true));
}

curl_close($curl);
```
L'exemple complet est disponible [ici](https://github.com/mailnjoy/check-api/tree/master/examples/php/basic/)

### Validation en masse

Indisponible pour le moment ([consulter la roadmap de l'API](https://trello.com/b/LUHqg3Bm))


## Aller plus loin
La description technique de l'API est disponible sur le [SwaggerHub](https://app.swaggerhub.com/apis-docs/mailnjoy/check-by_mailn_joy_api/1.0.0).

Nous proposons un certain nombre de service afin de faciliter l'intégration de notre API à vos services: SDK, serveur de développement, ... 

Afin d'obtenir plus de détails sur ces outils, consulter des exemples d'intégrations ou explorer plus avant les possibilités de l'API, nous vous invitons à consulter la [documentation complète](docs/README.md) et à vous rendre sur le [site dédié aux developpeurs de Mailnjoy](https://developer.mailnjoy.com).

## Roadmap
La roadmap de cette API est disponible sur [Trello](https://trello.com/b/LUHqg3Bm).

Tout comme nos services, l'API est encore jeune. Nous avons déjà en tête un certain nombre de fonctionnalités qui pourront améliorer votre expérience de développement, mais nous sommes également à votre écoute.

Vous avez un besoin, une idée pour améliorer notre API? Vous pouvez envoyer vos suggestions sur l'adresse mail dediée: [`contact-developer@mailnjoy.com`](mailto:contact-developer@mailnjoy.com)

## Contact

Pour toute question technique liée à l'API, la documentation ou l'intégration des services Mailnjoy, vous pouvez nous contacter par mail via l'adresse [`contact-developer@mailnjoy.com`](mailto:contact-developer@mailnjoy.com) ou en passant par [l'onglet contact](https://developer.mailnjoy.com/page-contact) du site développeur ([developer.mailnjoy.com](https://developer.mailnjoy.com)).

Si vous voulez nous contacter pour une question sur les services Mailnjoy ou que vous souhaitez devenir bêta-testeur, vous pouvez nous joindre via l'adresse de contact standard [`contact@mailnjoy.com`](mailto:contact-developer@mailnjoy.com) ou en passant par l'onglet [`contact`](https://check.mailnjoy.com/page-contact) du site de Check, si vous y avez accès.

## Licence

Les documentations de l'API et des SDK sont distribuées sous la [licence MIT](https://mit-license.org). Référez-vous au fichier `LICENSE` pour plus d'informations.
