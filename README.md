<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Web Staycation CRUD

The Staycation website offers comprehensive hotel data management features, including Create, Read, Update, and Delete (CRUD), along with user registration and login functionality. The entire system is built with a structured Laravel backend to ensure reliability, scalability, and ease of ongoing development.

## Run Locally
Make sure Composer and NodeJS are installed. If you're using Laragon, click Start All and open http://localhost/phpmyadmin/

Clone the project

```bash
  git clone https://github.com/rizzkiardi/web-staycation-crud.git
```

Go to the project directory

```bash
  cd web-staycation-crud
```

Open Visual studio code
```bash
  code .
```

Copy the .env.example file to .env.
In the .env file, create and configure the database.
```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=web-staycation-crud
  DB_USERNAME=root
  DB_PASSWORD=
```

open terminal
```bash
  composer install
```

Install dependencies

```bash
  npm install
```

Generate APP_KEY
```bash
  php artisan key:generate
```

Migration to database
```bash
  php artisan migrate
```

Run database seeder
```bash
  php artisan db:seed
```

Start the server

```bash
  php artisan serve
```
```bash
  npm run dev
```



