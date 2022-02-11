<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Test different way to retrive config values with laravel 9

This repo is only a simple way to test and measure config variable retrieve

### How to

```shell
  git clone git@github.com:danielebarbaro/laravel-config-values-tests.git
```

Create a sample db test

```shell
  cd laravel-config-values-tests
  composer install
  cp .env.example .env
```

Configure database variables

```shell
   php artisan migrate
   php artisan db:seed --class=ConfigSeeder
```

Launch a PHP server:
```shell
  php -S 127.0.0.1:8000 -t public
```

Visit http://127.0.0.1:8000/configs

Have fun!

