[Accèder à la version française](README_FR.md)
<p align="center">
  <img src="https://raw.githubusercontent.com/mailnjoy/api/master/public/images/mailnjoy_logo.png" alt="Logo" width="280" height="200">

  <h3 align="center">API partenaire de <span style="color:#95C11F;">Check by Mailnjoy<span></h3>

  <p align="center">
    is an email address validation solution. <br/>The API provides simple, automated and secure access to Check's services.
  </p>
</p>

## Table des matières

* [About Mailnjoy](#about-mailnjoy)
* [QuickStart](#quickstart)
  * [Prerequisites](#prerequisites)
  * [Unit validation](#unit-validation)
  * [Mass validation](#mass-validation)
  * [Consult credits](#bonus---check-credit-balance)
* [Going futher](#going-further)
* [Roadmap](#roadmap)
* [Contact](#contact)
* [License](#licence)

## About Mailnjoy
### Introduction
Mailnjoy is a company specialized in email marketing. It offers various value-added tools in this field.
Check is one of these products, enabling you to confirm the existence and commercial interest of an email address. 
### Contact (become a beta tester)
If you are interested in this service and would like to use it, please visit our website: [check.mailnjoy.com](https://check.mailnjoy.com/contact)

## QuickStart
Follow the steps adapted to your use case (validation of a single e-mail / many e-mails). In all cases, you'll need to satisfy the prerequisites first.

### Prerequisites
Each call to the API must be authenticated by a login/secret pair. To obtain access to the API, you first need to create a developer key, via the [site dedicated to developers: `https://developer.mailnjoy.com`](https://developer.mailnjoy.com)

Once authenticated, go to the [`API Accounts`](https://developer.mailnjoy.com/page-api-user) tab.

![API Accounts tab](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/comptes_api.png)

On this page, you can create new keys, by specifying:
 * The name of the key
 * Whether or not the key can modify your data (this parameter will be useful for future functions)
 * Whether the key can spend credits (authorize purchases). This parameter must be enabled to validate e-mail addresses, as this action consumes credits.

![Key creation](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/creation_cle_api.png)

You can also consult existing keys and retrieve id/secret pairs in the following section

![View existing keys](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/liste_cles_api.png)

Finally, by clicking on the button to the right of the key, you can access the key's details, such as id, secret or creation date.

![Key details](https://raw.githubusercontent.com/mailnjoy/api/master/public/images/detail_cle_api.png)

You also have the option of **deleting the key**. Please note that **this action is definitive**; you will not be able to retrieve this key at a later date.

### Unit validation
All examples are available in the folder [`examples`](https://github.com/mailnjoy/check-api/tree/master/examples)

#### Node.js

Define your credentials and the url of the unit validation API
```javascript
const mailnjoyId = "myId"
const mailnjoySecret = "mySecret"
const mailnjoyUnitaryPath = "https://api.mailnjoy.com/v1/unitary"
```

You can then make the call (here using the http client [axios](https://github.com/axios/axios))
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

Full example available [here](https://github.com/mailnjoy/check-api/tree/master/examples/nodejs/unitary/)

#### php
Define your credentials and the url of the unit validation API
```php
define("MAILNJOY_ID","myId");
define("MAILNJOY_SECRET","mySecret");
define("MAILNJOY_SERVER","https://api.mailnjoy.com/");
```

You can then make the call (here using the http client [CURL](https://www.php.net/manual/en/book.curl.php))
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
Full example available [here](https://github.com/mailnjoy/check-api/tree/master/examples/php/unitary/)

### Mass validation

List validation enables you to validate a large number of e-mail addresses, with a quality equivalent to that of unit validation. These validations cost less (1 credit per address) but are less rapid.

It is now possible to perform these validations en masse via SFTP. More information is available on the [Developer] site (https://developer.mailnjoy.com/page-home), in the "SFTP Documentation" section.  

This type of validation is not currently possible via API ([consult API roadmap](https://trello.com/b/LUHqg3Bm)).

### Bonus - Check credit balance

Using the previous developer key, you can query the API to obtain the credit balance of the parent account. This can be useful for uploading information to an interface or for setting up balance monitoring.

All examples are available in the folder [`examples`](https://github.com/mailnjoy/check-api/tree/master/examples)

####  Node.js
Using the previous credentials, we just add another endpoint to the base url
```javascript
const mailnjoyId = "myId"
const mailnjoySecret = "mySecret"
const mailnjoyCreditPath = "https://api.mailnjoy.com/v1/credit"
```
You can then make the call in the same way (here with the same http client [axios](https://github.com/axios/axios))
```javascript
axios.get(
  mailnjoyCreditPath,
  {
    "headers": {
      "mailnjoy-id": mailnjoyId,
      "mailnjoy-secret": mailnjoySecret
    }
  }
).then(result => {
  console.log(result.data) // the content is only an integer: your credit balance
}).catch(error => {
  console.log(error)
})
```
Full example [here](https://github.com/mailnjoy/check-api/tree/master/examples/nodejs/unitary/)

#### php
Define your credentials and the url of the unit validation API
```php
define("MAILNJOY_ID","myId");
define("MAILNJOY_SECRET","mySecret");
define("MAILNJOY_SERVER","https://api.mailnjoy.com/");
```
You can then make the call (here still using [CURL](https://www.php.net/manual/fr/book.curl.php))
```php
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, MAILNJOY_SERVER."v1/credit/");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl, CURLOPT_HTTPHEADER, array(
  "mailnjoy-id: ".MAILNJOY_ID,
  "mailnjoy-secret: ".MAILNJOY_SECRET,
));

$result = curl_exec($curl);
if(!$result) {
  echo curl_error($curl);
} else {
  echo $result." credits left";
}

curl_close($curl);
```
Full example [here](https://github.com/mailnjoy/check-api/tree/master/examples/php/unitary/)

## Going further
The technical description of the API is available on the [SwaggerHub](https://app.swaggerhub.com/apis-docs/mailnjoy/check-by_mailn_joy_api/).

We offer a number of services to facilitate the integration of our API with your services: SDK, development server, ... 

To find out more about these tools, see examples of integrations or explore the API's possibilities further, we invite you to read the [full documentation](docs/README.md) and visit the [Mailnjoy dedicated developer site](https://developer.mailnjoy.com).

## Roadmap
The roadmap for this API is available on [Trello](https://trello.com/b/LUHqg3Bm).

Like our services, the API is still in its infancy. We already have a number of features in mind that will enhance your development experience, and we're also listening to your feedback.

Do you have a need or an idea for improving our API? You can send your suggestions to our dedicated e-mail address: [contact-developer@mailnjoy.com](mailto:contact-developer@mailnjoy.com)

## Contact
For any technical questions relating to the API, documentation or integration of Mailnjoy services, you can contact us by e-mail at [`contact-developer@mailnjoy.com`](mailto:contact-developer@mailnjoy.com) or via the [contact tab](https://developer.mailnjoy.com/page-contact) on the developer site ([developer.mailnjoy.com](https://developer.mailnjoy.com)).

If you would like to contact us with a question about Mailnjoy services or would like to become a beta tester, you can reach us via the standard contact address [`contact@mailnjoy.com`](mailto:contact-developer@mailnjoy.com) or via the [`contact`](https://check.mailnjoy.com/page-contact) tab on the Check site, if you have access to it.

## License
API and SDK documentation is distributed under the [MIT license](https://mit-license.org). Please refer to the `LICENSE` file for more information.
