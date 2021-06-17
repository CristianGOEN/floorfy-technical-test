# Floorfy technical test

## How To Start

Clone this repository `git clone https://github.com/CristianGOEN/floorfy-technical-test.git`

Execute docker with `docker-compose up`

Serve the application with `php artisan serve`

## How to run tests

Use `vendor\bin\phpunit tests` to run tests

# REST API

## Create property
### Request
`POST /api/property/add`

## Update property
### Request
`PUT /api/property/update`

## Create tour
### Request
`POST /api/tour/add`

## Update tour
### Request
`PUT /api/tour/update`

## List tours by property
### Request
`GET /api/property/{propertyId}/tours`

