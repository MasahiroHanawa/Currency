# Currency Exchange

This is Currency exchange function by larael and fixer.io api

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

docker Version 18.03.1-ce-mac65
This is used [Laradock](https://github.com/laradock/laradock).
You can make laravel environment by this tool.

### Installing

You can start bellow command on \laradock.

```
$ docker-compose up workspace
# cd laravel
# composer install
# exit
$ docker-compose build workspace nginx mysql
$ docker-compose up workspace nginx mysql
```

And you can access

```
http://localhost
```

## Attention
This function does not include base currency and amount form and parameter
because of these don't include fixer.io api on basic plan.

## Running the tests

If you installed php on host,
You can start unit test bellow command

```
$ ./vendor/bin/phpunit tests/Feature/Hometest
```

## Deployment

Add additional notes about how to deploy this on a live system

## Authors

* **Masahiro Hanawa**
