# Doctors-Appointments-API
In our mini appointments system, there will be


> * Users
>   * Basic Laravel Users plus a User Type Id
> * Appointments
>   * Each appointment has:
>       * Start date
>       * End date
>       * Patient
>       * Doctor
>       * Status of the appointment, could be one of the following:
>           * Pending
>           * Completed
>           * Canceled
> * User types
>   * Each user type consists of
>       * Name
>       * Id
>

## Tasks:

>   * Create migrations files for the project requirements as given above
>   * Create RESTful CRUD endpoints for the Appointments Table only
>       * A. The Index action will be able to filter for future appointments and past appointments too
>       * B. Use translations when showing the status of the appointment
>   * Create Documentation for the API endpoints (Swagger or Postman)
>   * BONUS: use API authentication i.e. (Passport or Sanctum)
>   * BONUS: return the API data with camelCase
>   * BONUS: return the list of translation files as an API endpoint
>


### Installation

1. Open in cmd or terminal app and navigate to this folder
2. Run following commands

```bash
composer install
```

```bash
cp .env.example .env
```
make new database and edit env file
```bash
php artisan key:generate
```

```bash
npm install
```

```bash
npm run dev
```

```bash
php artisan cache:clear
```

```bash
php artisan config:cache
```

```bash
composer dump-autoload
```

```bash
php artisan migrate:fresh --seed
```

```bash
php artisan serve
```

And navigate to generated server link (http://127.0.0.1:8000)

#API Documentation here  (https://www.getpostman.com/collections/2d8d6ce8fe32e50c0f80)
