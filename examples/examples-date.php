<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Date;

// Example: get time
// 01.01.2018 => 1514754000
var_dump(Date::getTime('01.01.2018'));

// Example: to Format
// 2018-01-01 => 01.01.2018
var_dump(Date::toFormat('2018-01-01'));

// Example: to SQL
// 01.01.2018 => 2018-01-01
var_dump(Date::toSQL('01.01.2018'));