
# esolvd task
This project serves as the foundation for future robust backend projects developed using the Laravel PHP framework. It incorporates essential features and components to provide a solid starting point.
## Requirements

- Local server, e.g., XAMPP, WAMP, Laragon (Laragon is preferred).

- PHP 8.2 (Required for Laravel 11).

## Installation

- Clone the project:

```bash
 git clone https://github.com/halaibrahim867/esolvd-task.git

```

- Install composer packages:

```bash
  composer install
  npm install
```

- Setup your environment:

Rename `.env.example` file to `.env`, then generate your Laravel app key.

```bash
  php artisan key:generate
```


```bash
  php artisan key:generate

```
### Spatie Permission Setup

Publish the configuration and migration files:

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```

### Sanctum Setup

Publish Sanctum's configuration and migration files:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"



- Migrate and seed database:

```bash
  php artisan migrate --seed
```



- Clear cache:

```bash
  php artisan optimize:clear
```
