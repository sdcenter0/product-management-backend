# Product Management

## Installation

### Requirements

- PHP 8.1
- Composer
- NodeJS

### Backend Installation

To install the backend project, follow these steps:

1. Clone the repository
2. Run `composer install`
3. Run `cp .env.example .env`
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed`
6. Run `php artisan serve`
7. Go to `http://localhost:8000`
8. Login with `admin@admin.com` and `password`
9. Enjoy!

### Testing

1. Run `php artisan test`
2. Enjoy!
