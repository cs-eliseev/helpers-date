<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

use cse\helpers\Date;

// Example: get time by date
// 01.01.2018 => 1514754000
var_dump(Date::getTimeByDate('01.01.2018'));

