[English](https://github.com/cs-eliseev/helpers-date/blob/master/README.md) | Русский

DATE CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-date.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-date)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-date.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-date)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-date.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-date/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-date.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-date)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-date)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-date.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-date/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-date.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-date/archive/master.zip)

Данная библиотек позволяет удобно работать с датами. Доступны методы для получения дат, добавления дней, изменения формата, получения квартала и прочее.

Репозиторий проекта: https://github.com/cs-eliseev/helpers-date

**DATE**
```php
if (Date::isToday($date)) {
    $date = Date::changeDay($date, -7);
}
$mount = Date::diff($date, 'now', '%m');
Date::getQuarterByNumberMonth($mount);
```

***


## Описание проекта

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. DATE CSE HELPERS, позволит вам довольно просто получить дату, добавить день, изменить формат и д.р.

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-date).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-date
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-date": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-date.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-date/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-date.php](https://github.com/cs-eliseev/helpers-date/blob/master/examples/examples-date.php).


**Получить время по дате**

Пример:
```php
Date::getTime('01.01.2018');
// 1514754000
```

Использовать текущую дату:
```php
Date::getTime();
Date::getTime('now');
// timestemp
```

Использовать относительное время:
```php
Date::getTime('+1 week 2 days 4 hours 2 seconds');
// timestemp
```

**Изменить формат даты**

Пример:
```php
Date::toFormat('2018-01-01');
// 01.01.2018
```

Использовать timestamp:
```php
Date::toFormat(1514754000);
// 01.01.2018
```

Изменить формат поумолчанию:
```php
Date::toFormat(1514754000, 'Y/m/d');
// 2018/01/01
```

Использовать текущую дату:
```php
Date::toFormat();
Date::toFormat('now');
// d.m.Y
```

Использовать относительное время:
```php
Date::toFormat('+1 week 2 days 4 hours 2 seconds');
// d.m.Y
```

**Изменить формат на SQL**

Пример:
```php
Date::toSQL('01.01.2018');
// 2018-01-01
```

Использовать timestamp:
```php
Date::toSQL(1514754000);
// 2018-01-01
```

Использовать текущую дату:
```php
Date::toSQL();
Date::toSQL('now');
// Y-m-d
```

Использовать относительное время:
```php
Date::toSQL('+1 week 2 days 4 hours 2 seconds');
// Y-m-d
```

**Разница в датах**

Пример:
```php
Date::diff('2018-07-01', '01.07.2018');
// 0
```

Часовой формат:
```php
Date::diff('2018-07-01 02:00:00', '01.01.2018 00:00:00', '%h');
// 2
```

Использовать timestamp:
```php
Date::diff(strtotime('2018-09-02'), strtotime('2018-07-02'), '%m'));
// 2
```

Другие форматы:
```php
Date::diff('31.01.2018', 1514754000, '%d/%m'));
// 30/0
```

Разница с текущей датой:
```php
Date::diff('31.01.2018');
Date::diff('31.01.2018', 'now')
// %d
```

Использовать относительное время:
```php
Date::diff'31.01.2018', '+1 week');
// %d
```

**Текущая дата**

Пример:
```php
Date::current();
// d.m.Y
```

Установить формат:
```php
Date::current(Date::FORMAT_SQL);
// Y-m-d
```

**Получение крайних дат месяца**

Получить последний день месяца:
```php
Date::extremeMonthDate('11.01.2018');
// 2018-01-31
```

Получение первого дня месяца:
```php
Date::extremeMonthDate('28.02.2018', 'Y-m-01');
// 2018-02-01
```

Использование timestamp:
```php
Date::extremeMonthDate(strtotime('28.02.2018'), 'Y-m-01');
// 2018-02-01
```

Использовать текущую дату:
```php
Date::extremeMonthDate();
Date::extremeMonthDate('now');
// Y-m-last_mounth_day
```

Использовать отностиельное время:
```php
Date::extremeMonthDate('+1 week');
// Y-m-last_mounth_day + 1 week
```

**Получение квартала**

Пример:
```php
Date::getQuarter('31.12.2018 23:59:59');
// 4
```

Использование timestemp:
```php
Date::getQuarter(1514754000);
// 1
```

Использовать текущую дату:
```php
Date::getQuarter();
Date::getQuarter('now');
// quarter
```

Использовать относительное время:
```php
Date::getQuarter('+1 week 2 days 4 hours 2 seconds');
// quarter
```

**Получение квартала по номенру месяца**

Пример:
```php
Date::getQuarterByNumberMonth(12);
// 4
```

**Изменить день**

Добавить день:
```php
Date::changeDay('01.01.2018', 1);
// 02.01.2018
```

Отнять день:
```php
Date::changeDay('2018-01-01', -1);
// 31.12.2017
```

Изменить формат:
```php
Date::changeDay('01.01.2018', -1, Date::FORMAT_SQL);
// 2017-12-31
```

Использовать timestamp:
```php
Date::changeDay(timestamp('01.01.2018'), -1, Date::FORMAT_SQL);
// 2017-12-31
```

**Проверить на сегодня**

Пример:
```php
Date::isToday('01.01.2018 00:00:00');
// false
```

Использовать timestamp:
```php
Date::isToday(1519804800);
// false
```

Использовать относительное время:
```php
Date::isToday('now');
// true
```

**Проверить дату**

Пример:
```php
Date::checkDateByTimestamp((new \DateTime('now'))->format('U'));
// true
```


## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

DATE CSE HELPERS это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-date/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)