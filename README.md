# Drug Cards Test
## Getting Started

1. `composer install` to install dependencies
2. Run `docker compose build --no-cache` to build fresh images
2. Run `docker compose up` to build fresh images

## Additional info

* use `php bin/console product:parse` inside container to parse
* or use `docker compose  exec php bin/console product:parse` outside
* Messenger worker should be automatically run in container to consume messages
