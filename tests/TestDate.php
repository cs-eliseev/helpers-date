<?php

use cse\helpers\Date;
use PHPUnit\Framework\TestCase;

class TestDate extends TestCase
{
    /**
     * @param $date
     * @param $expected
     *
     * @dataProvider providerGetTimeByDate
     */
    public function testGetTimeByDate($date, $expected): void
    {
        $this->assertEquals($expected, Date::getTimeByDate($date));
    }

    /**
     * @return array
     */
    public function providerGetTimeByDate(): array
    {
        return [
            [
                '01.01.2018',
                1514764800,
            ],
            [
                1519804800,
                1519804800,
            ],
            [
                true,
                null,
            ],
        ];
    }
}