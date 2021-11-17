Для поднятия площадки необходимо:
1. Склонировать проект
2. Выполнить **docker-compose up -d**
3. Выполнить **composer install**

Не уверен, что правильно понял задание. В моем понимании задачи:
- есть 3 (может быть и больше) сторонних удаленных сервисов, которые имеют разные форматы взаимодействия
- изменить эти сервисы мы не можем, так как они удаленные 
- данные сервисы возвращают, каждый в своем формате, определенный набор конфигов
- необходимо написать сервис, которые скомбинирует данные сторонние сервисы и вытащит из них всех эти конфиги

Работа реализована в виде api методов.

После поднятия площадки, будут доступны следующие методы:
1. GET api/v1/configs - будут отданы все конфиги, разделенные по сервисам
2. GET api/v1/configs/{serviceSlug} - будет отданы конфиги конкретного сервиса
5. PUT api/v1/configs/{serviceSlug}/{configSlug} - будет обновлен указанный конфиг в указанном сервисе (не работает)

Для упрощения, ввел понятия:
serviceSlug - некий уникальный идентификатор конкретного удаленного сервиса,
configSlug - некий уникальный идентификатор конкретного конфига конкретного удаленного сервиса

Роуты описаны в файле nakukop/routes/api.php

Контроллеры nakukop/app/Http/Controllers/ConfigController.php

Бизнес логика вынесена в сервисы. Папка сервисов и их интерфейсов в nakukop/components
Фактически у нас 1 сервис ConfigService
Ди контейнеры описываются в файле nakukop/bootstrap/bootstrap.php

Логирование сделано в LogService в самом базовом виде в файл nakukop/storage/logs/logs.log)

В ConfigService сделано два слоя - самого сервиса и провайдеров. В целом сервис изолирован от фреймворка,
то есть при желании смены фреймворка или если будет нужно использовать сервисы еще где-то (через команду например), ничего не должно сломаться.

Тесты планировал делать, но к сожалению, больше не могу уделить на задание время

Если задание понято неверно, могу переделеать
