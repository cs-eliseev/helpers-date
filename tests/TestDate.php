<?php

use cse\helpers\Date;
use PHPUnit\Framework\TestCase;

class TestDate extends TestCase
{
    /**
     * @param $date
     * @param $expected
     *
     * @dataProvider providerGetTime
     */
    public function testGetTime($date, $expected): void
    {
        $this->assertEquals($expected, Date::getTime($date));
    }

    /**
     * @return array
     */
    public function providerGetTime(): array
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

    /**
     * @param null|string $date
     * @param string $format
     * @param $expected
     *
     * @dataProvider providerConvertDateToFormat
     */
    public function testToFormat($date, string $format, $expected): void
    {
        $this->assertEquals($expected, Date::toFormat($date, $format));
    }

    /**
     * @return array
     */
    public function providerToFormat(): array
    {
        $now = (new \DateTime('now'));

        return [
            [
                null,
                Date::FORMAT_DEFAULT,
                null,
            ],
            [
                $now->format(Date::FORMAT_DEFAULT),
                Date::FORMAT_DEFAULT,
                $now->format(Date::FORMAT_DEFAULT),
            ],
            [
                $now->format(Date::FORMAT_SQL),
                Date::FORMAT_DEFAULT,
                $now->format(Date::FORMAT_DEFAULT),
            ],
            [
                strtotime($now->format(Date::FORMAT_DEFAULT . ' H:i:s')),
                Date::FORMAT_DEFAULT . ' H:i:s',
                $now->format(Date::FORMAT_DEFAULT . ' H:i:s'),
            ],
        ];
    }

    /**
     * @param null|string $date
     * @param $expected
     *
     * @dataProvider providerToSql
     */
    public function testToSql($date, $expected): void
    {
        $this->assertEquals($expected, Date::toSQL($date));
    }

    /**
     * @return array
     */
    public function providerToSql(): array
    {
        $now = (new \DateTime('now'));

        return [
            [
                null,
                null,
            ],
            [
                '01.2018',
                null,
            ],
            [
                $now->format(Date::FORMAT_DEFAULT),
                $now->format(Date::FORMAT_SQL),
            ],
            [
                $now->format(Date::FORMAT_SQL),
                $now->format(Date::FORMAT_SQL),
            ],
            [
                strtotime($now->format(Date::FORMAT_DEFAULT . ' H:i:s')),
                $now->format(Date::FORMAT_SQL . ' H:i:s'),
            ],
        ];
    }
}