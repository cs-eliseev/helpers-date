<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Date;

// Example: get time
// 01.01.2018 => 1514754000
var_dump(Date::getTime('01.01.2018'));
echo PHP_EOL;

// Example: to Format
// 2018-01-01 => 01.01.2018
var_dump(Date::toFormat('2018-01-01'));
// Example: to Format change default format
// 2018-01-01 => 01/01/2018
var_dump(Date::toFormat('2018-01-01', 'd/m/Y'));
echo PHP_EOL;

// Example: to SQL
// 01.01.2018 => 2018-01-01
var_dump(Date::toSQL('01.01.2018'));
echo PHP_EOL;

// Example: diff
// 0
var_dump(Date::diff('2018-07-01', '2018-07-01'));
// 2
var_dump(Date::diff('2018-07-01 02:00:00', '01.01.2018 00:00:00', '%h'));
// 2
var_dump(Date::diff(strtotime('2018-09-02'), strtotime('2018-07-01'), '%m'));
// 0
var_dump(Date::diff('31.01.2018', strtotime('2018-01-02'), '%d/%m'));
echo PHP_EOL;
