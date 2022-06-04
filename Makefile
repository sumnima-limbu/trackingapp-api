.DEFAULT_GOAL := help

build: ## build develoment environment with laradock
	if ! [ -f ./.env ];then cp ./.env.example ./.env;fi
	docker-compose build

setup: ## Setup key and seed database (after build only)
	docker-compose up -d
	docker-compose exec app bash -c "composer install"
	docker-compose exec app bash -c "php artisan key:generate"
	docker-compose exec app bash -c "php artisan migrate && php artisan migrate:refresh"
	docker-compose exec app bash -c "php artisan db:seed"
	docker-compose down --remove-orphans

serve: ## Run Server (after setup only)
	docker-compose up -d

stop: ## Stop Server (after serve only)
	docker-compose down --remove-orphans

tinker: ## Run tinker (after serve only)
	docker-compose exec app bash -c "php artisan tinker"

bash: ## Open bash in app container (after serve only)
	docker-compose exec app bash

test: ## Run tests
	docker-compose run app php artisan test


.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
