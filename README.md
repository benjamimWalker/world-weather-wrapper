<p align="center">
  <img src="https://raw.githubusercontent.com/benjamimWalker/world-weather-wrapper/master/assets/logo.png" alt="Project logo" />
</p>
<p align="center">
  <a href="https://github.com/benjamimWalker/world-weather-wrapper/actions/workflows/tests.yml">
    <img src="https://github.com/benjamimWalker/world-weather-wrapper/actions/workflows/tests.yml/badge.svg" alt="Tests" />
  </a>
</p>

## Overview
World Weather Wrapper is a Laravel-based PHP project that acts as a caching and rate-limited proxy layer over third-party weather services. It improves performance and reliability by integrating Redis caching, and secure API request handling.
## Technology

Key Technologies used:

* PHP
* Laravel 12
* Nginx
* Redis as queue driver for jobs
* Docker + Docker Compose
* PestPHP automated testing
* Rate limiting
* CI pipeline with GitHub Actions

## Getting started

> [!IMPORTANT]  
> You must have Docker and Docker Compose installed on your machine.

* Clone the repository:
```sh
git clone https://github.com/benjamimWalker/world-weather-wrapper.git
```

* Go to the project folder:
```sh
cd world-weather-wrapper
```

* Prepare environment files:
```sh
cp .env.example .env
```

* Build the containers:
```sh
docker compose up -d
```

* Install composer dependencies:
```sh
docker compose exec app composer install
```

* You can now execute the tests:
```sh
docker compose exec app php artisan test
```

* And access the documentation at:
```sh
http://localhost/docs/api
```

## How to use

### 1 - Create a note

Send a GET request to /api/weather with the location name

![Content creation image](https://raw.githubusercontent.com/benjamimWalker/world-weather-wrapper/master/assets/weather.png)

## Features

The main features of the application are:
- Smart Redis caching for performance.
- Laravel rate limiting middleware.
- Full test coverage with PestPHP.
- API documentation.
- Clean, maintainable Laravel 12 code with proper architecture.

[Benjamim] - [benjamim.sousamelo@gmail.com]<br>
Github: <a href="https://github.com/benjamimWalker">@benjamimWalker</a>

