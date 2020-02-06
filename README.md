
Окружение: PHP-7.2, MySQL-5.6

Как запустить приложение: 
- распаковать архив в нужную директорию веб-сервера
- создать базу данных и пользователя БД
- параметры подключения к БД прописать в файле config/db.php
- применить миграции (для создания структуры базы данных и заполнения данными). Применить миграции можно с помощью консольной команды 'yii migrate'. Сами миграции находятся в каталоге /migrations

Веб-приложение будет доступно по адресу http://<адрес сервера>/wifi/web/index.php
API по адресу http://<адрес сервера>/wifi/web/index.php/point_api/get?point_id=<point_id>

