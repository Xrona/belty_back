all: up

cp-env:
	@test -f .env || cp .env.example .env

build:
	./build.sh

install: build composer-install up artisan-key-generate migrate artisan-seed admin-lte generate-ide-helper yarn-install yarn-dev

up:
	@docker-compose up -d --build --remove-orphans

down:
	@docker-compose down

down-v:
	@docker-compose down -v

restart:
	@docker-compose restart

stop:
	@docker-compose stop

env:
	@docker-compose exec --user=www-data php bash

env-root:
	@docker-compose exec php bash

artisan-key-generate:
	@docker-compose exec --user=www-data php php artisan key:generate

composer-install:
	@docker-compose run --rm -e COMPOSER_MEMORY_LIMIT=-1 php composer install

composer-command:
	@docker-compose run --rm php composer $(command)

migrate:
	@docker-compose exec --user=www-data php php artisan migrate

artisan-seed:
	@docker-compose exec --user=www-data php php artisan db:seed

generate-ide-helper:
	@docker-compose exec --user=www-data php php artisan ide-helper:generate

artisan-cmd:
	@docker-compose exec --user=www-data php php artisan $(cmd)

admin-lte:
	@docker-compose exec --user=www-data php php artisan adminlte:install

crud-generator:
	@docker-compose exec --user=www-data php php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"

yarn-install:
	@docker-compose run --rm node yarn install

yarn-dev:
	@docker-compose run --rm node yarn dev

yarn-watch:
	@docker-compose run --rm node yarn dev-watch

yarn-prod:
	@docker-compose run --rm node yarn prod

yarn-command:
	@docker-compose run --rm node yarn $(command)
