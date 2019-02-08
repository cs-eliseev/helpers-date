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

    /**
     * @param $start
     * @param $end
     * @param string $type
     * @param $expected
     *
     * @dataProvider providerDiffDates
     */
    public function testDiffDates($start, $end, string $type, $expected): void
    {
        $this->assertEquals($expected, Date::diff($start, $end, $type));
    }

    /**
     * @return array
     */
    public function providerDiffDates(): array
    {
        return [
            [
                '2018-07-01',
                '2018-07-01',
                'd',
                0,
            ],
            [
                '2018-07-01',
                strtotime('2018-07-02'),
                'd',
                1,
            ],
            [
                strtotime('2018-09-02'),
                strtotime('2018-07-02'),
                'm',
                2,
            ],
            [
                '2018-07-01 02:00:00',
                '2018-07-01 00:00:00',
                'h',
                2,
            ],
        ];
    }
}