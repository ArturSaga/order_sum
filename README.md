# Shop

Shop Service — это микросервис для подсчета суммы с учетом скидок. Он предоставляет API для подсчета суммы заказа с учетом скидок.

## Основные возможности

- Подсчет суммы заказа, с учетом скидок на товар

## Инструкция по установке и запуску

1. Склонируйте репозиторий:

   ```bash
   git clone https://your-repository-url.git
   cd src

2. Постройте и запустите Docker-контейнеры:
   ```bash
   docker-compose up --build

3. Настройте файл окружения .env.
   Скопируйте файл .env.example в .env:
    ```bash
   cp .env.example .env
   
4. Установите зависимости
   ```bash
   docker-compose exec app composer install

5. Примените миграции для создания необходимых таблиц в базе данных:
   ```bash
   docker-compose exec app php artisan migrate

## Автор
Артур С. telegram - @mando_019