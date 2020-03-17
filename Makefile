build:
	composer install 

run:
	php -f Run.php

test:
	vendor/bin/phpunit app/tests/.