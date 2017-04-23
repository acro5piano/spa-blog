# spa-blog

Single Page Blog application with

- [Lavavel 5.4](https://laravel.com/)
- [Vue.js 2.2](https://vuejs.org)
- [Element.io](http://element.eleme.io/#/en-US)
- [JWTAuth](https://github.com/tymondesigns/jwt-auth)

DEMO: https://presto-unicon.herokuapp.com/

# Why SPA?

SPA (Single Page Application) make user experience much better.

# Why Laravel?

Laravel is designed to use modern frontend development.

Laravel contains the following stacks by defualt:

- Webpack
- Vue.js

And laravel-mix build all asset files.

# Why Vue.js?

Vue.js is one of modern JavaScript framework.
It can be installed partialy, but its ecosystem enables us to make simple, lightweight, elegant SPA.

- axios
- vue-router
- vue-spinner

Bigger appliction may need state management system such as `vuex`.


# Why Blog app?

Login-enabled Blog app requires the basic of web technology.  It includes

- RESTful routing
- State Management (legacy session or JWTAuth, OAuth2, etc.)
- Database Migration

# Development

Docker and Docker Compose is recommended.

```bash
git clone git@github.com:acro5piano/spa-blog.git
cd spa-blog


# Dependencies
docker-compose build
docker-compose run --rm web composer install
docker-compose run --rm nodejs yarn install

# Config
cp .env.example .env
docker-compose exec web php argisan key:generate
docker-compose exec web php artisan migrate --seed

# Start
docker-compose up
```

Go to http://localhost:8000
