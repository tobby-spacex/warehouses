<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Warehouse management system

The application is a Warehouse management system where you can create a warehouse, create products and add products to the warehouse.

## Set Up

### installation prerequisites

| Parameter     | Type     | Description   |
| :--------     | :------- | :------------ |
| `php`         | `**`     | **Required**. |
| `mysql`       | `8.0.32` | **Required**. |
| `composer`    | `2`      | **Required**. |

### Get in

1. Clone the repository (then switch to `development` branch)

```bash
  git clone https://github.com/tobby-spacex/warehouses.git
```

2. configure .env file with your local configuration

3. run the following command from the project directory

```bash
    composer install
    php artisan migrate
    npm install
    npm run dev
    php artisan serve
```

4. check `http://localhost:8000/`

5. the project uses TailwindCSS, make sure that styles are compiled