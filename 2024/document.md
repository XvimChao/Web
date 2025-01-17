# Пояснительная записка для API

## Антропов А.Г., гр. 01321

***

# Описание API

## 1. Общие сведения

В ходе изучения предметной области были выделены такие сущности как:

1.      "prisoners"
2.      "users"

***

## 2. Схема данных БД

### Описание схемы данных

|   #   | Сущность           | Атрибуты                                                                                                                                     |
| :---: | :----------------- | :--------------------------------------------------------------------------------------------------------------------------------------------|
|   1   | prisoners          |id, created_at, updated_at, case_number, surname, first_name, middle_name, nickname, birth_year, birth_place, nationality, party_affiliation, |
|       |                    |education_level, residence_location, marital_status, occupation, workplace, arrest_day, arrest_month, arrest_year, court_body, verdict_day,  |
|       |                    |verdict_month, verdict_year, articles, decision, rehabilitation_day, rehabilitation_month, rehabilitation_year, rehabilitation_authority     |
|       |                    |memory_book_volume_number, memory_book_page_number, creator_id                                                                                |
|   2   | users              | id, name, email, email_verified_at, password, remember_token, created_at, updated_at, status                                                 |

***

## 3. Структура БД
>
> ### 1. Сущность "prisoners"

Хранит информацию об объекта prisoners

|  Сущность  |       Атрибуты        |   Тип данных    |                   Описание                    |
| :--------: | :-------------------: | :-------------: | :-------------------------------------------: |
| prisoners  |                       |                 |        Хранит информацию о гладиаторах        |
|            |          id           | BIGINT(20) (PK) |      Уникальный идентификатор гладиатора      |
|            |      created_at       |    TIMESTAMP    |           Время создания гладиатора           |
|            |      updated_at       |    TIMESTAMP    |           Время создания гладиатора           |
|            |     case_number       |  VARCHAR(255)   |              Номер уголовного дела            |  
|            |      surname          |  VARCHAR(255)   |            Фамилия репрессированного          |
|            |      first_name       |  VARCHAR(255)   |            Имя репрессированного              |
|            |      middle_name      |  VARCHAR(255)   |            Отчество репрессированного         |
|            |      nickname         |  VARCHAR(255)   |            Прозвище репрессированного         |
|            |      birth_year       |    INTEGER      |                  Год рождения                 |
|            |      birth_place      |  VARCHAR(255)   |                  Место рождения               |
|            |      nationality      |  VARCHAR(255)   |                  Национальность               |
|            |    party_affiliation  |  VARCHAR(255)   |            Принадлежность к партии            |
|            |    education_level    |  VARCHAR(255)   |                Уровень образования            |
|            |    residence_location |  VARCHAR(255)   |                 Место проживания              |
|            |    marital_status     |  VARCHAR(255)   |                 Семейное положение            |
|            |       occupation      |  VARCHAR(255)   |              Род занятий, должность           |
|            |        workplace      |  VARCHAR(255)   |                 Место работы                  |
|            |        arrest_day     |    INTEGER      |                 День ареста                   |
|            |       arrest_month    |    INTEGER      |                 Месяц ареста                  |
|            |       arrest_year     |    INTEGER      |                 Год ареста                    |
|            |        court_body     |  VARCHAR(255)   |        Орган, рассматривавший дело            |
|            |        verdict_day    |    INTEGER      |            День вынесения приговора           |
|            |        verdict_month  |    INTEGER      |            Месяц вынесения приговора          |
|            |        verdict_year   |    INTEGER      |            Год вынесения приговора            |
|            |          articles     |  VARCHAR(255)   |                 Статья (статьи)               |
|            |         decision      |  VARCHAR(255)   |           Решение по делу (приговор)          |
|            |rehabilitation_day     |    INTEGER      |               День реабилитации               |
|            |rehabilitation_month   |    INTEGER      |               Месяц реабилитации              |  
|            |rehabilitation_year    |    INTEGER      |               Год реабилитации                |
|            |rehabilitation_authority |  VARCHAR(255) |   Орган, принявший решение о реабилитации     |
|            |memory_book_volume_number|  INTEGER      |Номер тома Книги памяти жертв политических репрессий (физический вариант)|
|            |memory_book_page_number  |  INTEGER      |Страница Книги памяти жертв политических репрессий|
|            |      creator_id       | BIGINT(20) (FK) | Уникальный идентификатор создателя гладиатора |

> #### Связи сущности "prisoners"

|   #   |  Сущность  |        Поле         | Cвязь |  Поле   | Сущность |
| :---: | :--------: | :-----------------: | :---: | :-----: | :------: |
|   1   | prisoners  |   creator_id (FK)   |  N:1  | id (PK) |  users   |


> #### Ограничения внешних ключей сущности "prisoners"

|   #   | Поле  | Ограничения | Описание |
| :---: | :---: | :---------: | :------: |
|   1   |   -   |      -      |    -     |

> ### 2. Сущность "users"

| Сущность |     Атрибуты      |   Тип Данных    |                 Описание                 |
| :------: | :---------------: | :-------------: | :--------------------------------------: |
|  users   |                   |                 |    Хранит информацию о пользователях     |
|          |        id         |   BIGINT (PK)   |  Уникальный идентификатор пользователя   |
|          |       name        |  VARCHAR (255)  |             Имя пользователя             | 
|          |       email       |  VARCHAR (255)  |      Электронный адрес пользователя      |
|          | email_verified_at |    TIMESTAMP    |  Время подтверждения электронной почты   |
|          |     password      |  VARCHAR (255)  |           Пароль пользователя            |
|          |  remember_token   |  VARCHAR(100)   |  Токен для аутентификации пользователя   |
|          |    created_at     |    TIMESTAMP    |       Время создания пользователя        |
|          |    updated_at     |    TIMESTAMP    | Время последнего обновления пользователя |
|          |      status       | BIGINT(20) (FK) |           Уровень прав доступа           |

> #### Связи сущности "users"

|   #   | Сущность |    Поле     | Cвязь |      Поле       |      Сущность      |
| :---: | :------: | :---------: | :---: | :-------------: | :----------------: |
|   1   |  users   |   id (PK)   |  1:N  | creator_id (FK) |     prisoners     |

## 3. Выполнение запросов

### Коды запросов
|   #   |  Код  | Описание                                          |
| :---: | :---: | ------------------------------------------------- |
|   1   |  200  | Запрос выполнен успешно, данные получены          |
|   2   |  201  | Запрос выполнен успешно, объект создан            |
|   3   |  401  | Запрос не выполнен, ошибка авторизации            |
|   3   |  403  | Запрос не выполнен, запрет на выполнение операции |
|   4   |  404  | Запрос не выполнен, объект не удалось найти       |
|   5   |  422  | Запрос не выполнен, данных не валидны             |

### 1 - Получение Bearer-токена

#### 1.1 Получение токена авторизации для пользователя, имеющего права на создание объектов

Запрос:

```http
POST http://webdevcourse.local/sanctum/token HTTP/1.1
```

Пример тела запроса:

```http
Accept: application/json
Content-Type: application/json

{
    "email": "адрес электронной почты пользователя",
    "password": "пароль пользователя",
    "device_name": "тип устройства"
}
```

Пример результат выполнения запроса:

```http
1|tu0zsaZJnGpw36CZQsJM1rDgWDQyMWto9iva3Kvc -- Пример токена авторизации пользователя
```

### 2 - Создание объектов (для создания объектов необходим токен авторизации)

#### 2.2 - Создание объекта prisoners (право на создание имеет только авторизованный пользователь)

Запрос:

```http
POST http://webdevcourse.local/api/prisoner HTTP/1.1
```

Пример тела запроса:

```http
Accept: application/json
Content-Type: application/json
Authorization: Bearer 1|tu0zsaZJnGpw36CZQsJM1rDgWDQyMWto9iva3Kvc -- Пример токена авторизации

{
    "case_number": "укажите номер уголовного дела",
    "surname": "укажите фамилию репрессированного",
    "first_name": "укажите имя репрессированного",
    "middle_name": "укажите отчество репрессированного",
    "nickname": "укажите прозвище репрессированного"
    ...
}
```

Пример результата выполнения запроса:

```http
HTTP/1.1 201 Created
Date: Thu, 16 Jan 2025 23:59:51 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
Vary: Authorization
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "data": {
    "case_number": "1411\/\u0441",
    "surname": "\u0411\u0410\u0411\u0410\u0420\u042b\u041a\u0418\u041d",
    "first_name": "\u041f\u0435\u0442\u0440",
    "middle_name": "\u041c\u0438\u0445\u0430\u0439\u043b\u043e\u0432\u0438\u0447",
    "nickname": "\u0411\u041e\u0411\u041e\u0420\u042b\u041a\u0418\u041d",
    "birth_year": 1880,
    "birth_place": "\u0433. \u041a\u0438\u0435\u0432",
    "nationality": null,
    "party_affiliation": null,
    "education_level": null,
    "residence_location": "\u0411\u041c\u0410\u0421\u0421\u0420, \u043d\u0430\u0441\u0435\u043b\u0435\u043d\u043d\u044b\u0439 \u043f\u0443\u043d\u043a\u0442 \u0423\u043b\u0430\u043d-\u0423\u0434\u044d",
    "marital_status": "\u0416\u0435\u043d\u0430\u0442, 2 \u0434\u0435\u0442\u0435\u0439",
    "occupation": null,
    "workplace": "\u041c\u0443\u0437\u044b\u043a\u0430\u043d\u0442, \u0413\u043e\u0441\u0444\u0438\u043b\u0430\u0440\u043c\u043e\u043d\u0438\u044f",
    "arrest_day": 20,
    "arrest_month": 4,
    "arrest_year": 1939,
    "court_body": "\u0412\u0435\u0440\u0445\u043e\u0432\u043d\u044b\u043c \u0441\u0443\u0434\u043e\u043c \u0411\u041c\u0410\u0421\u0421\u0420",
    "verdict_day": 3,
    "verdict_month": 9,
    "verdict_year": 1939,
    "articles": "58-10 \u0447.1",
    "decision": "\u041e\u043f\u0440\u0430\u0432\u0434\u0430\u043d",
    "rehabilitation_day": 8,
    "rehabilitation_month": 4,
    "rehabilitation_year": 1997,
    "rehabilitation_authority": "\u041f\u0440\u043e\u043a\u0443\u0440\u0430\u0442\u0443\u0440\u043e\u0439 \u0420\u0411",
    "memory_book_volume_number": 2,
    "memory_book_page_number": 1,
    "creator_id": 1,
    "updated_at": "2025-01-16T23:59:54.000000Z",
    "created_at": "2025-01-16T23:59:54.000000Z",
    "id": 11
  }
}

```

#### 2.3 - Выполнение запросов без токена авторизации

Результат выполнения запроса:

```http
HTTP/1.1 401 Unauthorized
Date: Fri, 17 Jan 2025 00:15:05 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "message": "Unauthenticated."
}
```


#### 2.4 - Создание объекта без валидных данных/отсутствие полей
Пример результата выполнения запроса: 
```http
HTTP/1.1 422 Unprocessable Content
Date: Fri, 17 Jan 2025 00:16:01 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
Vary: Authorization
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "message": "The given data was invalid.",
  "errors": {
    "birth_year": [
      "The birth year must be an integer.",
      "The birth year must be 4 digits."
    ]
  }
}

```

### 3 - Получение объектов

#### 3.1 - Получение всех объектов gladiators

Запрос:

```http
GET http://webdevcourse.local/api/prisoner/all HTTP/1.1
```

Пример тела запроса:

```http
Accept: application/json
Content-Type: application/json
```

Пример результата выполнения запроса:

```http
HTTP/1.1 200 OK
Date: Fri, 17 Jan 2025 00:16:53 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "data": [
    {
      "id": 2,
      "created_at": "2025-01-02T17:09:00.000000Z",
      "updated_at": "2025-01-02T17:09:00.000000Z",
      "case_number": "7649",
      "surname": "\u0410\u041b\u0415\u0415\u0412",
      "first_name": "\u041c\u0443\u0445\u0430\u0440",
      "middle_name": "\u0410\u043b\u0438\u0435\u0432\u0438\u0447",
      "nickname": "",
      "birth_year": 1915,
      "birth_place": "\u0422\u0430\u0442\u0430\u0440\u0438\u044f, \u041a\u043e\u043a\u043c\u043e\u0440\u0441\u043a\u0438\u0439, \u0410\u0440\u0433\u0430\u044f\u0441\u044c",
      "nationality": "",
      "party_affiliation": "",
      "education_level": "",
      "residence_location": "\u0411\u041c\u0410\u0421\u0421\u0420, \u0417\u0430\u0438\u0433\u0440\u0430\u0435\u0432\u0441\u043a\u0438\u0439 \u0440\u0430\u0439\u043e\u043d, \u043d\u0430\u0441\u0435\u043b\u0435\u043d\u043d\u044b\u0439 \u043f\u0443\u043d\u043a\u0442 \u041e\u043d\u043e\u0445\u043e\u0439",
      "marital_status": "",
      "occupation": "",
      "workplace": "",
      "arrest_day": 19,
      "arrest_month": 6,
      "arrest_year": 1938,
      "court_body": "\u0422\u0440\u043e\u0439\u043a\u043e\u0439 \u041d\u041a\u0412\u0414 \u0418\u0440\u043a\u0443\u0442\u0441\u043a\u043e\u0439 \u043e\u0431\u043b\u0430\u0441\u0442\u0438",
      "verdict_day": 8,
      "verdict_month": 7,
      "verdict_year": 1938,
      "articles": "\u0441\u0442.58-9, 58-11",
      "decision": "10 \u043b\u0435\u0442 \u043b\u0438\u0448\u0435\u043d\u0438\u044f \u0441\u0432\u043e\u0431\u043e\u0434\u044b",
      "rehabilitation_day": 14,
      "rehabilitation_month": 11,
      "rehabilitation_year": 1989,
      "rehabilitation_authority": "\u041f\u0440\u043e\u043a\u0443\u0440\u0430\u0442\u0443\u0440\u0430 \u0411\u0443\u0440\u0410\u0421\u0421\u0420",
      "memory_book_volume_number": 1,
      "memory_book_page_number": 1,
      "creator_id": 2
    }...(остальные объекты prisoners)
    ]
}
```

#### 3.2 - Получение всех объектов users (необходим токен авторизации администратора/модератора)

Запрос:

```http
GET http://127.0.0.1:8000/api/users/all HTTP/1.1
```

Пример тела запроса:

```http
Accept: application/json
Content-Type: application/json
Authorization: Bearer 2|LrCs1StF4fJuW5ZHSWo7m5T3CIYyNfj6mdLlllfx
```

Пример результата выполнения запроса:

```http
HTTP/1.1 200 OK
Host: 127.0.0.1:8000
Connection: close
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
Date: Thu, 31 Oct 2024 17:31:49 GMT
Content-Type: application/json
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *

{
  "data": [
    {
      "id": 1,
      "name": "wuwunchik",
      "email": "atochin99@mail.ru",
      "password": "$2y$10$g2xUofrComD1ZpN7m28yLunMyQxDklhMzY7CMX3uhwra50s4pnAQO",
      "email_verified_at": null
    }...(остальные объекты users)
  ]
}
```


### 4 - Обновление объектов
### 4.1 - Обновление объекта prisoners (необходим токен авторизации администратора/модератора)


Запрос:

```http
PUT http://webdevcourse.local/api/prisoner/(целое_неотрицательное_число) HTTP/1.1
```

Пример тела запроса:

```http
Accept: application/json
Content-Type: application/json
Authorization: Bearer 1|tu0zsaZJnGpw36CZQsJM1rDgWDQyMWto9iva3Kvc


{
    "case_number": "укажите номер уголовного дела",
    "surname": "укажите фамилию репрессированного",
    "first_name": "укажите имя репрессированного",
    "middle_name": "укажите отчество репрессированного",
    "nickname": "укажите прозвище репрессированного"
    ...
}
```

Пример результата выполнения запроса:

```http
HTTP/1.1 200 OK
Date: Fri, 17 Jan 2025 00:21:03 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
Vary: Authorization
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "data": {
    "id": 4,
    "created_at": "2025-01-02T17:32:07.000000Z",
    "updated_at": "2025-01-17T00:21:04.000000Z",
    "case_number": 1743,
    "surname": "\u0410\u042e\u0420\u041e\u0412",
    "first_name": "\u0427\u043e\u0439\u0436\u043e",
    "middle_name": null,
    "nickname": null,
    "birth_year": 1878,
    "birth_place": "\u0411\u041c\u0420, \u0421\u0435\u043b\u0435\u043d\u0433\u0438\u043d\u0441\u043a\u0438\u0439, \u043d\u0430\u0441\u0435\u043b\u0435\u043d\u043d\u044b\u0439 \u043f\u0443\u043d\u043a\u0442 \u0411\u0443\u0440\u0433\u0443\u043b\u0442\u0430\u0439",
    "nationality": null,
    "party_affiliation": null,
    "education_level": null,
    "residence_location": "\u0413\u044d\u0433\u044d\u0442\u0443\u0439\u0441\u043a\u0438\u0439 \u0434\u0430\u0446\u0430\u043d",
    "marital_status": null,
    "occupation": "\u041b\u0430\u043c\u0430",
    "workplace": null,
    "arrest_day": 20,
    "arrest_month": 8,
    "arrest_year": 1933,
    "court_body": "\u0422\u0440\u043e\u0439\u043a\u043e\u0439 \u041f\u041f \u041e\u0413\u041f\u0423 \u0412\u0421\u041a",
    "verdict_day": 20,
    "verdict_month": 9,
    "verdict_year": 1933,
    "articles": "58-10",
    "decision": "\u0412\u044b\u0441\u043b\u0430\u043d",
    "rehabilitation_day": 8,
    "rehabilitation_month": 5,
    "rehabilitation_year": 1997,
    "rehabilitation_authority": "\u041f\u0440\u043e\u043a\u0443\u0440\u0430\u0442\u0443\u0440\u043e\u0439 \u0420\u0411",
    "memory_book_volume_number": 2,
    "memory_book_page_number": 1,
    "creator_id": 1
  }
}

```
### 4.2 - Обновление объекта users (необходим токен авторизации администратора/модератора)

Запрос:

```http
PUT http://127.0.0.1:8000/api/user/(целое_неотрицательное_число) HTTP/1.1
```

Пример тела запроса:

```http
Accept: application/json
Content-Type: application/json
Authorization: Bearer 2|J6bkcrqQFPP4G0z4Kdh2cvs7I5Mk1PzGPRAp0vZW

{
    "id": "укажите идентификатор объекта users (целое неотрицательное число)",
    "name": "укажите отредактированное наименование объекта users",
    "email": "укажите отредактированный электронный адрес объекта users",
    "password": "укажите отредактированный пароль объекта users",
    "status": "укажите идентификатор прав доступа объекта users"
}
```

Пример результата выполнения запроса:

```http
HTTP/1.1 200 OK
Date: Fri, 01 Nov 2024 07:05:40 GMT
Server: Apache/2.4.48 (Win64) OpenSSL/1.1.1k PHP/7.4.21
Vary: Authorization
X-Powered-By: PHP/7.4.21
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 58
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "data": {
    "id": 8,
    "name": "ludmila",
    "email": "ludaaa@gmail.com",
    "password": "$2y$10$08T\/fv8lLGxYDFLNuDCKnOmlBDEa6UO\/0Fwf0m8ZFx0XXNS9Fg3Cu",
    "email_verified_at": null
  }
}

```
### 4.3 - Обновление объектов без токена авторизации

Пример результата выполнения запроса:

```http
HTTP/1.1 401 Unauthorized
Date: Fri, 17 Jan 2025 00:21:43 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "message": "Unauthenticated."
}
```
### 4.4 - Обновление объектов на правах обычного пользователя

Пример результата выполнения запроса:

```http
HTTP/1.1 403 Forbidden
Date: Fri, 17 Jan 2025 00:22:14 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
Vary: Authorization
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "message": "Wrong user account!",
  "exception": "Symfony\\Component\\HttpKernel\\Exception\\HttpException",
  "file": "E:\\Web\\3_\u043a\u0443\u0440\u0441\\WebDev\\webdevcourse.local\\api\\2024\\lesson1\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php",
  ...
}
```
## 5 - Удаление объектов
### 5.1 - Удаление объекта prisoners (необходим токен авторизации администратора/модератора)

Запрос:

```http
DELETE  http://webdevcourse.local/api/prisoner/(целое_неотрицательное_число) HTTP/1.1
```

Тело запроса:

```http
Accept: application/json
Content-Type: application/json
Authorization: Bearer 1|tu0zsaZJnGpw36CZQsJM1rDgWDQyMWto9iva3Kvc
```

Пример результата выполнения запроса:

```http
HTTP/1.1 200 OK
Date: Fri, 17 Jan 2025 00:25:19 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
Vary: Authorization
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

```

### 5.2 - Удаление объекта users (необходим токен авторизации администратора/модератора)

Запрос:

```http
GET http://webdevcourse.local/api/user/delete/(целое_неотрицательное_число) HTTP/1.1

```

Тело запроса:

```http
Accept: application/json
Content-Type: application/json
Authorization: Bearer 11|VYjyf68Gz1gOX7aGEkFxeKqrpoZ94jYKMtt5UZCD
```

Пример результата выполнения запроса:

```http
HTTP/1.1 200 OK
Date: Fri, 01 Nov 2024 07:49:23 GMT
Server: Apache/2.4.48 (Win64) OpenSSL/1.1.1k PHP/7.4.21
Vary: Authorization
X-Powered-By: PHP/7.4.21
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 58
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8
```


### 5.3 - Удаление объекта без токена авторизации

Пример результата выполнения запроса:

```http
HTTP/1.1 401 Unauthorized
Date: Fri, 17 Jan 2025 00:25:49 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "message": "Unauthenticated."
}

```
### 5.4 - Удаление объекта на правах обычного пользователя

Пример результата выполнения запроса:

```http
HTTP/1.1 404 Not Found
Date: Fri, 17 Jan 2025 00:26:13 GMT
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12
Vary: Authorization
X-Powered-By: PHP/8.2.12
Cache-Control: no-cache, private
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 58
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

{
  "message": "No query results for model [App\\Models\\Prisoner] 3",
  "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
  "file": "E:\\Web\\3_\u043a\u0443\u0440\u0441\\WebDev\\webdevcourse.local\\api\\2024\\lesson1\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
  ...
}
```
