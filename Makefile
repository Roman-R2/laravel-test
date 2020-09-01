up: docker-up
down: docker-down
restart: docker-down docker-up
init: docker-down laravel-test-clear docker-pull docker-duild docker-up laravel-test-init

my:
	sudo chown -R roman:roman laravel-test

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-duild:
	docker-compose build

laravel-test-init: laravel-test-wait-db laravel-test-ready

laravel-test-clear:
	docker run --rm -v ${PWD}/laravel-test:/app --workdir=/app alpine rm -f .ready

laravel-test-wait-db:
	until docker-compose exec -T laravel-test-postgres pg_isready --timeout=0 --dbname=app ; do sleep 1 ; done

laravel-test-ready:
	docker run --rm -v ${PWD}/laravel-test:/app --workdir=/app alpine touch .ready

git:
	git status
	git add .
	git commit -m "${M}"
	git push