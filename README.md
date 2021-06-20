<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt=""></a>

## Quickstart
1. [Install docker](https://docs.docker.com/install/)
2. [Install docker-compose](https://docs.docker.com/compose/install/)
3. Install traefik [https://gogs.mt-pc.ru/danjudex/traefik](https://gogs.mt-pc.ru/danjudex/traefik)

##Install
Copy .env file (update if required)

Полная установка приложения в Docker 
```
make install
```

Для подключения к рабочему окружению 
```
make env
```

Установка **composer**
```
make composer-install
```

Выполнение команд **composer**
```
make composer-command command="require \"packege/packege\":\"dev-master\""
```

Установка миграций
```
make migrate
```

Установка сидов
```
make artisan-seed
```

Генерация _ide-helper.php
```
make generate-ide-helper
```

Выполнение **artisan** команд
```
make artisan-cmd cmd="command"
```

## Yarn

Установка пакетов из `yarn.lock`
```
make yarn-install
```

Добавление пакета в `package.json`
```
make yarn-command command="add package:0.1"
```

Сборка в dev режиме
```
make yarn-dev
# or 
make yarn-watch
```

Сборка в prod режиме
```
make yarn-prod
```

## DEMO

`administrator` role account
```
Login: admin@example.com
Password: admin
```
