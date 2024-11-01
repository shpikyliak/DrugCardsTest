# Drug Cards Test
## Getting Started

1. `composer install` to install dependencies
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up` to build fresh images
4. Run `docker compose  exec php bin/console doctrine:migrations:migrate` to run migrations

## Additional info

* use `php bin/console product:parse` inside container to parse
* or use `docker compose  exec php bin/console product:parse` outside
* Messenger worker should be automatically run in container to consume messages
* go to <https:localhost/api/parsed-products> to see endpoint results
