![Laravel API to Postman Header](/header.png)

[![Latest Stable Version](https://poser.pugx.org/DanieleTulone/laravel-api-to-postman/v)](//packagist.org/packages/DanieleTulone/laravel-api-to-postman)
[![StyleCI](https://github.styleci.io/repos/323709695/shield?branch=master)](https://github.styleci.io/repos/323709695?branch=master)

# Laravel API to Postman

This package allows you to automatically generate a Postman collection based on your API routes. It also provides basic configuration and support for bearer auth tokens and basic auth for routes behind an auth middleware.

For `POST`, `PUT`, `GET` requests that utilizes a FormRequest, you can optionally scaffold the request, and publish rules in raw or human readable format.

## Postman Schema

The generator works for the latest version of the Postman Schema at the time of publication (v2.1.0).

## Installation

Install the package:

-   Update `require-dev` and `repositories` of your project composer.json:

```json
{
    "require-dev": {
        "danieletulone/laravel-api-to-postman": "dev-master"
    },
    "repositories": {
        "danieletulone/laravel-api-to-postman": {
            "type": "vcs",
            "url": "https://github.com/danieletulone/laravel-api-to-postman.git"
        }
    }
}
```

Publish the config file:

```bash
php artisan vendor:publish --provider="DanieleTulone\PostmanGenerator\PostmanGeneratorServiceProvider" --tag="postman-config"
```

## Configuration

You can modify any of the `api-postman.php` config values to suit your export requirements.

Click [here](/config/api-postman.php) to view the config attributes.

## Usage

### CLI (artisan)

The output of the command being ran is your storage/app directory.

To use the command simply run:

```bash
php artisan export:postman
```

The following usage will generate routes with the bearer token specified.

```bash
php artisan export:postman --bearer="1|XXNKXXqJjfzG8XXSvXX1Q4pxxnkXmp8tT8TXXKXX"
```

The following usage will generate routes with the basic auth specified.

```bash
php artisan export:postman --basic="username:password123"
```

If both auths are specified, bearer will be favored.

### Route

Go to `${APP_URL}/postman/download` and a postman file will be generated on fly and download.
You can also download a file with a given name: `${APP_URL}/postman/download?name=my-project`.

## Contributing

You're more than welcome to submit a pull request, or if you're not feeling up to it - create an issue so someone else can pick it up.
