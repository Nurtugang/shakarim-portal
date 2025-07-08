## Установка

1. Клонировать проект
2. Перейдите в корневой каталог проекта
3. Установить зависимости `composer install`
4. Установить зависимости  `npm install` и `npm run build`
5. Скопируйте `.env.example` в файл `.env` и настройте параметры
6. Миграция БД
    - php artisan migrate;
7. php artisan storage:link	
8. Запустите `php artisan serve`