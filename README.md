# Product Catalog
## RESTful API Project with Back-end Panel in Laravel

# Introduction

Your test task is to create a mini-platform which aims to provide catalog functionality for
consumption through RESTful API end-points. There should be also administrative panel to
browse, create, view, update and delete products. There should be also users, every user can
manage their own products. The admin panel should use the API end-points to retrieve or modify
current information.

The access to the admin panel should be restricted for authenticated users. Thus a login page
should be available along with a form for registration.

The platform should also utilize a cache, you could select freely the type of server (Redis,
Memcache, etc). The cache should be properly updated when the resources are being modified
(created, updated, removed). The end-points in the API which are returning information (list,
preview) should use the cached data if it is available, and database data otherwise.

Please use a single project for both the admin panel and the RESTful API.

# Technology

## Back-end

To create this project we suggest you to use Laravel framework for PHP. The framework version is
of your choice, but we would also suggest to use one of the recent versions.

You can complete the task with any other PHP framework if you feel uncomfortable with Laravel.

Please use database migrations to set up the database, i.e. to create users table, products and so
on. You can also use seeders to create initial content.

Use Eloquent ORM or any available alternative of your choice.

## Front-end

The project would require minimal front-end development to create the interface for listing,
preview and resource modification. As this is a back-end task, the front-end implementation is not
going to be used in the final assessment.

# End-points
Here you can find all the endpoints which should be accessible in your API implementation. Every
one of them should rely on a custom request header **Api-Key** to authenticate users by their own
**API key**. Unauthenticated access should result in proper error response. JSON format should be
used with the response content.

| Primary End-Points |||
| ------------- |---------------|-------|
| GET      | /products      | Returns a list of all user products available |
| POST     | /products      | Creates new product for the current user |
| GET      | /products/{id} | Returns detailed information about single product, by its ID, owned by the current user |
| PUT      | /products/{id} | Updates an existing product of the user |
| DELETE   | /products/{id} | Remove a product for the user |

# Entities

This section contains information about the entities in the mini-platform.

# Users

The users should be able to log in with username and password. Note that you can freely use the
default functionality in Laravel or the framework of your choice. You need one more custom field -
**API key** for API implementation to authenticate the user. It should be **unique and automatically
generated for each user**. It should be **20 characters** long.

# Products

Products owned by one user cannot be accessed or modified by other users. Please refer to their
specification below:

| Primary End-Points ||
| ------------- |---------------|
| Property      | Description      |
| Name     | The name of the product - free text, min. 2 characters, max. 20 characters      |
| Description      | Free large text; max. size 16 KiB |
| Price      | Numeric price of the product; min. 0.00, max. 100 000.00 |
| Active   | A boolean flag indicating if the product is active or not |
| User   | The owning user of the product |

# Bonus Objectives
• Create forgotten password functionality along with the login and register page

• Use a queue to store cache update commands, you would need a listener to consume it

• Add timestamps to store date of creation and last modification

• Apply soft deletes to virtually delete a product without removing its record from the database

# Run Project

php composer install

npm install

php artisan migrate

php artisan db:seed

npm run prod

---

# Laravel 5.8.*

# PHP 7.3.*

# Vue.js

---