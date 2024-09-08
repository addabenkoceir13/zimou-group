Hello 👋 ZIMOU GROUP
===============

Product Management
=====================


## Technologies Used 
- Laravel v8
- PHP v8.0
- MySQL v8.1

## Feature

- Authentication

- Admin Panel
     - User Management

- User Panel
    - Task Management

## How To Use

### Download Repository
> clone repository
```bash
 git clone https://github.com/addabenkoceir13/zimou-group.git
```
> open folder
```bash
 cd zimou-group
```
> run commend 
```bash
 composer install
```
> Create file .env
```bash
 cp .env.example .env.
```
> Generate Key Of .env
```bash
 php artisan key:generate.
```

### Create DataBase && Migration && Seeding
> Create DataBase
```bash
 CREATE DATABASE IF NOT EXISTS 'zimouteam'
```
> Go to file .env
```bash
DB_DATABASE=zimouteam
```
# Migration Table and seeder
```bash
 php artisan migrate --seed

```

### How to use the application

[http://zimouteam.test/](http://zimouteam.test/)

> Details for logging in

> email
```bash
admin@zimou.team
```
> passswoed
```bash
123456789
```

#### Admin Panel
> Type in the URL below.

[http://zimouteam.test/dashboard](http://zimouteam.test/dashboard)

> Details for logging in

> email
```bash
user01@zimou.team
```
> passswoed
```bash
123456789
```

#### User Panel
> Type in the URL below.

[http://testdealerconsulting.test/user/login](http://testdealerconsulting.test/user/login)


