<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Date;

// Example: get time
// 01.01.2018 => 1514754000
var_dump(Date::getTime('01.01.2018'));
// Example: current date
var_dump(Date::getTime());
// Example: relative time
var_dump(Date::getTime('+1 week 2 days 4 hours 2 seconds'));
echo PHP_EOL;

// Example: to Format
// 2018-01-01 => 01.01.2018
var_dump(Date::toFormat('2018-01-01'));
// Example: to Format change default format
// 2018-01-01 => 01/01/2018
var_dump(Date::toFormat('2018-01-01', 'd/m/Y'));
// Example: current date
var_dump(Date::toFormat());
// Example: relative time
var_dump(Date::toFormat('+1 week 2 days 4 hours 2 seconds'));
echo PHP_EOL;

// Example: to SQL
// 01.01.2018 => 2018-01-01
var_dump(Date::toSQL('01.01.2018'));
// Example: current date
var_dump(Date::toSQL());
// Example: relative time
var_dump(Date::toSQL('+1 week 2 days 4 hours 2 seconds'));
echo PHP_EOL;

// Example: diff
// 0
var_dump(Date::diff('2018-07-01', '2018-07-01'));
// 2
var_dump(Date::diff('2018-07-01 02:00:00', '01.01.2018 00:00:00', '%h'));
// Example: timestamp
// 2
var_dump(Date::diff(strtotime('2018-09-02'), strtotime('2018-07-01'), '%m'));
// 0
var_dump(Date::diff('31.01.2018', strtotime('2018-01-02'), '%d/%m'));
// Example: current date
var_dump(Date::diff('31.01.2018'));
// Example: relative time
var_dump(Date::diff('31.01.2018', '+1 week'));
echo PHP_EOL;

// Example: current
var_dump(Date::current());
// Example: set format
var_dump(Date::current(Date::FORMAT_SQL));
echo PHP_EOL;

// Example: extreme month date
var_dump(Date::extremeMonthDate('11.01.2018'));
// Example: first date month
var_dump(Date::extremeMonthDate(strtotime('28.02.2018'), 'Y-m-01'));
// Example: current date
var_dump(Date::extremeMonthDate());
// Example: relative time
var_dump(Date::extremeMonthDate('+1 week'));
echo PHP_EOL;

// Example: get quarter
// 31.12.2018 23:59:59 => 4
var_dump(Date::getQuarter('31.12.2018 23:59:59'));
// Example: current date
var_dump(Date::getQuarter());
// Example: relative time
var_dump(Date::getQuarter('+1 week'));
echo PHP_EOL;

// Example: get quarter by number month
// 12 => 4
var_dump(Date::getQuarterByNumberMonth(12));
echo PHP_EOL;

// Example: change day
// 01.01.2018 => 02.01.2018
var_dump(Date::changeDay('01.01.2018', 1));
// Example: sub day
// 2018-01-01 => 31.12.2018
var_dump(Date::changeDay('2018-01-01', -1));
// Example: change format
// 01.01.2018 => 2017-12-31
var_dump(Date::changeDay('01.01.2018', -1, Date::FORMAT_SQL));
echo PHP_EOL;