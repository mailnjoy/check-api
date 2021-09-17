
<h3 align="center">API partenaire de <span style="color:#95C11F;">Check by Mailnjoy<span></h3>

## Tester l'API
L'API Check ne dispose pas encore de sandbox pour mener à bien des développements / des tests, bien que cela soit prévu (voir la [roadmap](https://trello.com/b/LUHqg3Bm)). 
En attendant, vous pouvez toujours utiliser des alternative pour simuler le comportement de l'API.

## Simuler l'API Check unitaire avec Prism
### Qu'est ce que Prism
[Prism](https://stoplight.io/open-source/prism/) est un projet sous licence Apache permettant de simuler un endpoint API, pour pouvoir tester/développer en utilisant cette API sans réaliser de vrais appels.
Vous pouvez utiliser Prism en vous basant sur le [fichier de spécification OpenAPI](https://github.com/mailnjoy/check-api/blob/master/openapi-specs/api-specification.yaml) disponible dans le dépôt. La documentation de Prism est disponible sur [ici](https://stoplight.io/p/docs/gh/stoplightio/prism/README.md).

Nous vous fournirons simplement ici un exemple rapide vous permettant de répondre à vos besoins basiques de développement.

### Utiliser Prism 
Il faut tout d'abord installer Prism: [voir les options d'installation](https://github.com/stoplightio/prism/blob/master/docs/getting-started/01-installation.md)

À partir de là, vous pouvez lancer le serveur (l'option `errors` permet d'avoir des messages d'erreur plus explicites):
```bash
prism mock api-specification.yaml --errors
[xx:xx:xx] » [CLI] ...  awaiting  Starting Prism…
[xx:xx:xx] » [CLI] i  info      POST       http://127.0.0.1:4010/v1/unitary?type=simple
[xx:xx:xx] » [CLI] ►  start     Prism is listening on http://127.0.0.1:4010
``` 
Vous pouvez reprendre les scripts d'exemple en remplaçant l'adresse `htttp://api.mailnjoy.com` par ce qui est précisé dans la console (ici `http://127.0.0.1:4010`) 
Il vous faudra également préciser des valeurs dans les champs d'identification (`mailnjoy-id` et `mailnjoy-secret`). Prism ne va évidemment pas vérifier la validité du couple id/secret, mais si ces headers sont absents, il renverra une erreur 401, comme le ferait le vrai serveur.

Pour les validations unitaire, par défaut, Prism ne vous renverra que l'exemple de validation `simple`, peut importe le type que vous passerez en argument.
Pour recevoir une format `deep`, vous devrez préciser un header supplémentaire:
```bash
Prefer: example=deep
```
