# BoolBnB

## Project Link

https://docs.google.com/document/d/1XGHTa1inNEMFxGzDi_blpwdztwA9hqnuqF6RCfODDBQ/edit?usp=sharing

## TEAM
### Class 4 - Group 2

- Nicholas Antidormi
- Michele Consoli
- Gabriele Mandarà
- Ruggero Marina

## Installation

```sh
$ git clone https://github.com/FmC00/bool-bnb.git
$ composer install
$ npm install
$ cp .env.example .env
```

Create new Database, and insert db data in .env file as follow:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

```sh
BRAINTREE_ENV=sandbox
BRAINTREE_MERCHANT_ID=id
BRAINTREE_PUBLIC_KEY=key
BRAINTREE_PRIVATE_KEY=privatekey
```

Generate your key:

```sh
$ php artisan key:generate
```

Run the migrations and seeds

```sh
$ php artisan migrate:refresh --seed
```
