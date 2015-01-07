![PixHub](https://raw.githubusercontent.com/cisoun/PixHub/master/doc/logo.png)

PixHub is a free picture sharing community platform. It was made by two students from the HE-Arc engineering school of Neuchâtel (Switzerland).

PixHub's goal is to offer you, a simple and nice platform to share your pictures with a community. Run the server, manage it and let your visitors upload their creations.

## Dependancies

- MySQL
- PHP
- Composer

## Deployment

### Installation

```bash
git clone https://github.com/cisoun/PixHub
cd PixHub
composer update
```

### Configuration

#### Database

Add your database identifiers in app/config/database.php and choose which database connection you will use.
For example, if you use MySQL, just modify the "default" value.

```
'default' => 'mysql',
```

#### reCAPTCHA
You must add your reCAPTCHA API key in order to use the sign up page. Go to https://www.google.com/recaptcha/admin#list and create your keys.

When it's done, add them to PixHub/app/config/packages/greggilbert/recaptcha/config.php.

### Running PixHub

On the new directory, simply execute

```bash
php artisan serve
```
