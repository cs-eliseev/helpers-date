DATE CSE HELPERS
=======

The helpers allows you to JSON processing. Encode, decode, check error, throw exception - all this is available in this library.

Project repository: https://github.com/cs-eliseev/helpers-date

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. Date CSE HELPERS used method: encode, decode, check error, throw exception.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-date).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-json
```

Or file composer.json should include the following contents:
```
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

**Convert date to format**

Example:
```php
Date::toFormat('2018-01-01');
// 01.01.2018
```

Change default format:
```php
Date::toFormat('01.01.2018', 'Y/m/d');
// 2018/01/01
```

**Convert date to SQL**

Example:
```php
Date::toSQL('01.01.2018');
// 2018-01-01
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

Date time:
```php
Date::diff(strtotime('2018-09-02'), strtotime('2018-07-02'), '%m'));
// 2
```

Other format:
```php
Date::diff('31.01.2018', strtotime('2018-01-02'), '%d/%m'));
// 29/0
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

**Extrme mouth date**

Example:
```php
Date::extremeMouthDate('11.01.2018');
// 2018-01-31
```

First day:
```php
Date::extremeMouthDate(strtotime('28.02.2018'), 'Y-m-01');
// 2018-02-01
```

Default:
```php
Date::extremeMouthDate();
// Date::extremeMouthDate('now') => Y-m-last day
```


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-date/blob/master/LICENSE.md) file for licensing details.