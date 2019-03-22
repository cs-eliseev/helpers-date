DATE CSE HELPERS
=======

The helpers allows you to easy use DATE. Change format, add/sub day, diff date, get quarter - all this is available in this library.

Project repository: https://github.com/cs-eliseev/helpers-date

```php
if (Date::isToday($date)) {
    $date = Date::changeDay($date, -7);
}
$mount = Date::diff($date, 'now', '%m');
Date::getQuarterByNumberMonth($mount);
```

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. Date CSE HELPERS used method: change format, add/sub day, diff date, get quarter and other.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers project:**
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

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-date).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-date
```

Or file composer.json should include the following contents:
```json
{
    "require": {
        "cse/helpers-date": "*"
    }
}
```

### Git

Clone this repository locally:
```shell
git clone https://github.com/cs-eliseev/helpers-date.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-date/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-date.php](https://github.com/cs-eliseev/helpers-date/blob/master/examples/examples-date.php).

**GET time by date**

Example:
```php
Date::getTime('01.01.2018');
// 1514754000
```

Use curent date:
```php
Date::getTime();
// Date::getTime('now')
```

Use relative time:
```php
Date::getTime('+1 week 2 days 4 hours 2 seconds');
```

**Convert date to format**

Example:
```php
Date::toFormat('2018-01-01');
// 01.01.2018
```

Use timestamp:
```php
Date::toFormat(1514754000);
// 01.01.2018
```

Change default format:
```php
Date::toFormat(1514754000, 'Y/m/d');
// 2018/01/01
```

Use curent date:
```php
Date::toFormat();
// Date::toFormat('now')
```

Use relative time:
```php
Date::toFormat('+1 week 2 days 4 hours 2 seconds');
```

**Convert date to SQL**

Example:
```php
Date::toSQL('01.01.2018');
// 2018-01-01
```

Use timestamp:
```php
Date::toSQL(1514754000);
// 01.01.2018
```

Use curent date:
```php
Date::toSQL();
// Date::toSQL('now')
```

Use relative time:
```php
Date::toSQL('+1 week 2 days 4 hours 2 seconds');
```

**Diff date**

Example:
```php
Date::diff('2018-07-01', '2018-07-01');
// 0
```

Date format hour:
```php
Date::diff('2018-07-01 02:00:00', '01.01.2018 00:00:00', '%h');
// 2
```

Use timestamp:
```php
Date::diff(strtotime('2018-09-02'), strtotime('2018-07-02'), '%m'));
// 2
```

Other format:
```php
Date::diff('31.01.2018', 1514754000, '%d/%m'));
// 30/0
```

Curent date:
```php
Date::diff('31.01.2018');
// Date::diff('31.01.2018', 'now')
```

Use relative time:
```php
Date::diff'31.01.2018', '+1 week');
```

**Current date**

Example:
```php
Date::current();
```

Set format:
```php
Date::current(Date::FORMAT_SQL);
```

**Extrme month date**

Get last day month:
```php
Date::extremeMonthDate('11.01.2018');
// 2018-01-31
```

Use timestemp get first day month:
```php
Date::extremeMonthDate(strtotime('28.02.2018'), 'Y-m-01');
// 2018-02-01
```

Use current date:
```php
Date::extremeMonthDate();
// Date::extremeMonthDate('now') => Y-m-last day
```

Use relative date:
```php
Date::extremeMonthDate('+1 week');
```

**Get quarter**

Example:
```php
Date::getQuarter('31.12.2018 23:59:59');
// 4
```

Use timestemp:
```php
Date::getQuarter(1514754000);
// 1
```

Use curent date:
```php
Date::getQuarter();
// Date::getQuarter('now')
```

Use relative time:
```php
Date::getQuarter('+1 week 2 days 4 hours 2 seconds');
```

**Get quarter by number month**

Example:
```php
Date::getQuarterByNumberMonth(12);
// 4
```

**Change day**

Add day:
```php
Date::changeDay('01.01.2018', 1);
// 02.01.2018
```

Sub day:
```php
Date::changeDay('2018-01-01', -1);
// 31.12.2017
```

Change format:
```php
Date::changeDay('01.01.2018', -1, Date::FORMAT_SQL);
// 2017-12-31
```

**Check today**

Example:
```php
Date::isToday('01.01.2018 00:00:00');
// false
```

Use timestamp:
```php
Date::isToday(1519804800);
// false
```

Use relative time:
```php
Date::isToday('now');
// true
```

**Check today**

Example:
```php
Date::checkDateByTimestamp((new \DateTime('now'))->format('U'));
// true
```


## Testing & Code Coverage

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

To run the PHPUnit unit tests, execute:
```shell
phpunit PATH/TO/PROJECT/tests/
```

If you want code coverage reports, use the following:
```shell
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Used PHPUnit default config:
```shell
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-date/blob/master/LICENSE.md) file for licensing details.