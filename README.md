# Garage V.Parrot

Ce projet est une application Symfony. Elle a été créée pour un garage automobile. elle comporte un back et un front.

## Installation

### Prérequis

Avant de commencer, assurez-vous d'avoir installé :
- PHP (version 8.2.4)
- Avoir définit php dans les variables d’environnement 
- Composer
- symfony CLI
- npm
- une base de données relationnelles (ex: mariaDB)
- faire la commande symfony check:requirement et si besoin modifier le fichier php.ini


### Étapes d'installation

1. Clonez ce dépôt : `git clone https://github.com/SandrineOrieux/Garage-V-Parrot.git`
2. Rendez-vous dans le répertoire du projet : `cd Garage-V-Parrot`
3. -1 Installez les dépendances via Composer : `composer install`
3. -2 Installez les dépendances via npm : `npm install`
4. Configurer le fichier .env pour la base de données et le mail
5. Eénérer les autoloads : `composer require symfony/runtime`
6. Créez la base de données : `symfony console doctrine:database:create`
7. Exécutez les migrations pour créer les tables : `synfony console doctrine:migrations:migrate`


## Utilisation
 - Lancez le serveur local : `symfony server:start` ou utilisez votre serveur web habituel.
 - Lancez npm : `npm run build` (pour developpement)

## Créer un admin
 - Créer un hash du password : `symfony console security:hash-password`
 - Insérer dans la Bdd : ``

## Contribuer

Si vous souhaitez contribuer à ce projet, veuillez suivre ces étapes :
1. Forker le projet
2. Créer une nouvelle branche (`git checkout -b feature/nom-de-la-fonctionnalite`)
3. Faire des modifications et commit (`git commit -am 'Ajouter une nouvelle fonctionnalité'`)
4. Push vers la branche (`git push origin feature/nom-de-la-fonctionnalite`)
5. Créer une Pull Request

## Auteurs

Orieux Sandrine.

## Licence

Pas de licence.

## Documentations 

- Composer :
https://getcomposer.org/download/

- Symfony CLI :
https://symfony.com/download

- Symfony :
https://symfony.com/

- Symfony webpack encore :
https://symfony.com/doc/current/frontend/encore/installation.html

- Symfony easyadmin :
https://symfony.com/bundles/EasyAdminBundle/

- UserCrudController pour le hash du mot de passe et confirmation :
https://dev.to/nabbisen/symfony-6-and-easyadmin-4-hashing-password-3eec

- Symfony vich uploader :
https://github.com/dustin10/VichUploaderBundle/blob/master/docs/index.md

- Icones du dashbord :
https://fontawesome.com

- Requête ajax avec axios :
https://axios-http.com/fr/docs/intro

- Rédaction de la page politique de confidentialité et mentions légales :
https://www.legalplace.fr/guides/politique-de-confidentialite-rgpd/
https://www.legalplace.fr/guides/mentions-legales/

- faker :
https://fakerphp.github.io/






