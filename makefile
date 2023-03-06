#!/usr/bin/make

.DEFAULT_GOAL := help


##@ Initialize work

init: ## Start a new develop environment
	cp .env.example .env
	cp docker-compose.yml.example docker-compose.yml
	docker-compose up -d
	docker-compose exec --user application laravel-101-nginx composer install
	docker-compose exec --user application laravel-101-nginx php artisan migrate


##@ Composer

install: ## Composer install dependencies
	docker-compose exec --user application laravel-101-nginx composer install

autoload: ## Run the composer dump
	docker-compose exec --user application laravel-101-nginx composer dump-autoload


##@ Utils

nginx:
	docker-compose exec --user application laravel-101-nginx bash

tinker:
	docker-compose exec --user application laravel-101-nginx php artisan tinker


##@ Docs

help: ## Print the makefile help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)
