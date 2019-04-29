test:
	./vendor/bin/phpunit --testdox

run-example:
	php -S localhost:3000 -t example

clean:
	rm -rf logs