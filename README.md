# Laravel Template

## About 
 - Template for project in Larvavel with Pest

## Installation

```bash
composer install
```

## Running the app

```bash
# preparation
cp .env.example .env
php artisan session:table
php artisan key:generate
```

```bash
# development
php artisan serve
```

## Test
- [Pest](https://pestphp.com)
```bash
# Run test
php artisan pest:run
```
