# Pharmacy System

A small pharmacy management system. This app was built with [Laravel](https://laravel.com/docs/8.x) .

## Features

* Pharmacies CRUD , which includes (show/create/update/delete)
* Products CRUD , which includes (show/create/update/delete)
* Products search with autocomplete
* A CLI command to search for a product and return its 5 cheapest prices in pharmacies 

## Installation

clone the repository , then run the following commands in your terminal:

```bash
cp .env.example .env
composer install
```

then set your host/database credintials in the .env , after that you are ready to run the migrations and seeds:

```bash
php artisan migrate --seed
```

done , now run the app:

```bash
php artisan serve
```
## CLI Command Usage

In your terminal , type the following command , where 1 is the id of the product:

```bash
php artisan products:search 1
```

A result like this will be printed on your screen:

```json
[
  {
    "id": 4,
    "name": "Ms. Billie Brekke",
    "price": "16.44",
    "quantity": 210
  },
  {
    "id": 6,
    "name": "Jake Will",
    "price": "58.41",
    "quantity": 401
  },
  {
    "id": 80,
    "name": "Kameron Turcotte",
    "price": "60.80",
    "quantity": 294
  },
  {
    "id": 7,
    "name": "Madison Jacobson",
    "price": "183.27",
    "quantity": 106
  },
  {
    "id": 2,
    "name": "Mrs. Emilie Haag",
    "price": "239.50",
    "quantity": 301
  }
]
```










# ALwrifi-Pharmacy-System
