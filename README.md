# MockMatch
## Description
- Laravel 6.20.27
- MySQL 5.7
- Nginx latest
- PHP-FPM latest

## Usage
### 開発環境構築手順
```sh
$ docker-compose build
$ docker-compose up -d
$ docker-compose exec app bash


# in `app` container
$ cd LunchMatch
$ composer install
$ npm install

# mailcatcher起動
$ mailcatcher --ip=0.0.0.0

# これは開発中動かしたままにしておく
$ npm run watch
```


### 開発環境構築の準備のために行った手順(通常は使わない)
```sh
$ docker-compose exec app bash


# in `app` container
$ composer create-project --prefer-dist laravel/laravel LunchMatch "6.*"
$ cd LunchMatch
$ composer require laravel/ui 1.*
$ php artisan ui vue
$ npm install
$ npm install vuetify

$ npm run watch
```
