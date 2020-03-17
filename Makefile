# official php docker build from https://hub.docker.com/_/php

build:
	composer install 
	docker build -t my-php-app .

run:
	docker run -it --rm --name my-running-app my-php-app

test:
	docker run -it --rm --name my-running-app my-php-app \
	vendor/bin/phpunit app/tests/.