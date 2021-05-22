# MockMatch
GTB2021 チームA「GMO LunchMatch」

## Description
- Laravel 6.20.27
- MySQL 5.7
- Nginx latest
- PHP-FPM latest


## Development
Mainブランチは保護されている（はず）なので各自で作業ブランチを切ってから作業してください。
margeする際は一人以上のレビュを受けないとできないので適当に声を掛けてみてください。

### Project (Develop)
https://github.com/homirun/LunchMatch/projects/1

### 画面
https://github.com/homirun/LunchMatch/issues/3

### FigJam
https://www.figma.com/file/VzH8gEjjp7JJPs0k5IhlH1/%E3%83%81%E3%83%BC%E3%83%A0A?node-id=0%3A1

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

## 参考URL
- https://qiita.com/ktoshi/items/5fd7a11cbc00b70c2db1
- https://github.com/homirun/laravel_docker_workspace
