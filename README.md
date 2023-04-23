<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## kaffein Laravel projet
Nous allons mettre en place dans ce projet laravel une API qui va comuniquer avec l'api de hubspot et traiter des données.

### mise en place
on va commencer par cloner le projet avec la commande `git clone https://github.com/dani03/hubspot_companies.git`.

Une fois le projet cloner, accèder y en entrant la commande `cd hubspot_companies`, et ouvrez le projet sur l'editeur de code de votre choix. 

A la racine tu projet créer un fichier `.env` ce fichier nous permettra de configurer nos differentes variables d'environement, copier y le code suivant dans le fichier `.env`precedent créer: 

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://hubspot.test

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
THE_ACCESS_TOKEN=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
remplacer les differentes variables d'environement par les informations adéquates `DB_DATABASE` le nom de votre base de données (NB: nous utilisons ici mysql)

`DB_USERNAME` le nom de votre utilisateur (ex: root) 
`DB_PASSWORD` votre mot de passe
`THE_ACCESS_TOKEN` renseigner par la valeur du "Jetons d'accès d'application privée" fourni par hubspot. 


une fois renseigner,
lancer la commande `composer install` afin d'installer les differentes dependences, ensuite taper la commande `php artisan key:generate` afin de generer une clé unique à notre application. 

nous somme enfin pret pour lancer notre projet.


## les migrations
Après avoir configurer notre projet nous devons mettre en place notre base de données via phpMyadmin ou tout autre gestionaire de base de données. créer votre base de données avec le même nom tel que défini dans votre variable d'environement  `DB_DATABASE` dans le fichier `.ENV`. 
lancez la commande `php artisan migrate`. vouspouvez ensuite voir dans votre base de données les differentes tables et colonnes.

## Peuplés la base de données

Afin de peuplé notre base de données nous n'allons pas utiliser ici les factories et seeders comme communement dans laravel, nous allons utilisez une commande via le terminal. 
entrer la commande `php artisan find:companies` cette commande permet de vider les données de certaines tables si il en existent et de recuperer les données de differentes companies et contacts via l'api de hubspot et nous les ajouter a notre DB. Une fois le message " [OK] companies and contacts has been retrieved successfully. "
votre base de données remplis avec les données de l'api de hubspot.

lancer ensuite votre projet avec la commande `php artisan serve --port 5000` vous pouvez bien evidement choisir le port de votre choix (3000, 2000, etc...) mais si vous comptez utiliser le projet front avec vue JS lancer l'api sur le port 5000 car le projet front ecoute l'api sur le port 5000.

voila votre API est prete vous pouvez tester les routes sur Postman insomnia etc...






