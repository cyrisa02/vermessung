# Deployment of Vermessung

## Requirements on the server

Whether in a local or online deployment, several things are required to allow Symfony to run properly on a server:

- PHP, version 8.0 at least

- Composer

## Clone the git repository locally or on a server

A public git repository is associated with the project Vermessung. To clone it locally or on a server, run the command :

`git clone https://github.com/cyrisa02/vermessung.git`

# We move in the folder

cd vermessung

## Install project dependencies

To install project dependencies from composer.json file, run the command :

`composer install`

## Configure database access and environment variables

Access the .env file at the root of the project. On the DATABASE_URL line, fill in your connection information to your own database in the form:

`DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"`

## Configure the database or with the Makefile

Create the database if it does not already exist :

`php bin/console doctrine:database:create --if-not-exists` or `make sf-dc`

Perform migrations in the database to create the different tables :

`php bin/console doctrine:migrations:migrate` or `make sf-dmm`

## Add false data automatically generated in the database (OPTIONAL), an admin account will be created

In order to test the project in conditions close to reality, it is possible to generate users, as well as measures automatically to fill the database as well as the site. To do this, run the command:

`php bin/console doctrine:fixtures:load` ou `make sf-fixtures`

## Run the server

`php bin/console server:run` or `make sf-start`

## Create an admin account to manage the site

`php bin/console doctrine:query:sql "INSERT INTO user(id,email,roles,password,lastname,firstname,picture,company,is_verified,phone) VALUES (UUID(),'email','['ROLE_ADMIN']','hash_mot_de_passe','nom_utilisateur','prenom_utilisateur','photo','company','2022-08-06 17:13:11','1','phone');"`

Comme l'exemple:

INSERT INTO `user` VALUES (15,'cyrisa02.test@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$2UdMQSEcgrMj0xkVgmTx6.0tqK5riv3zCu.DMwgntsfY/kaia7Bl.','Nom','Prénom','photo','company','2022-08-06 17:13:11','1','phone');

## Accounts already created on the online site. https://spacercalculator.cyrisa02.fr/

<h2>Admin: cyrisa02.test@gmail.com          password: admin </h2>

<p>craftsman: thierry88@picard.fr              password:azerty      / isVerified =true </p>

<p>craftsman: paul.ribeiro@live.com             password:azerty     / isVerified =false </p>

## Site How-To Videos

https://www.youtube.com/watch?v=BdYDilsv_ig&list=PLQtcbnWnIXZvngebReNEwIbutHTOzA_E2
