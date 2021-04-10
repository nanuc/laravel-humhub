This package wraps the HumHub API for use in Laravel.

## Installation
`composer require nanuc/laravel-humhub`

### Setup config
Add the following to `config/services.php` and edit the values:
```php
'humhub' => [
    'url' => env('HUMHUB_URL', 'https://yourhost/api/v1/'),
    'token' => env('HUMHUB_TOKEN')
],
```

### Get a token
To get a token you can use `php artisan humhub:token`. It will ask you for your HumHub username and password.

## Usage