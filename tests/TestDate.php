<?php

use cse\helpers\Date;
use PHPUnit\Framework\TestCase;

class TestDate extends TestCase
{
    /**
     * set default timezone UTC
     */
    protected function setUp(): void
    {
        date_default_timezone_set(Date::DEFAULT_TIMEZONE);
    }

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
     * @dataProvider providerToFormat
     */
    public function testToFormat($date, string $format, $expected): void
    {
        $this->assertEquals($expected, Date::toFormat($date, $format));
    }

    /**
     * @return array
     *
     * @throws Exception
     */
    public function providerToFormat(): array
    {
        date_default_timezone_set('UTC');
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
     *
     * @throws Exception
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
                $now->format(Date::FORMAT_SQL),
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
                '%d',
                0,
            ],
            [
                '2018-07-01',
                strtotime('2018-07-02'),
                '%d',
                1,
            ],
            [
                strtotime('2018-09-02'),
                strtotime('2018-07-02'),
                '%m',
                2,
            ],
            [
                '2018-07-01 02:00:00',
                '2018-07-01 00:00:00',
                '%h',
                2,
            ],
        ];
    }

    public function testCurrent(): void
    {
        $this->assertEquals(date(Date::FORMAT_DEFAULT), Date::current());
    }

    /**
     * @param $date
     * @param string $format
     * @param $expected
     *
     * @dataProvider providerExtremeMonthDate
     */
    public function testExtremeMonthDate($date, string $format, $expected): void
    {
        $this->assertEquals($expected, Date::extremeMonthDate($date, $format));
    }

    /**
     * @return array
     */
    public function providerExtremeMonthDate(): array
    {
        return [
            [
                '01.01.2018',
                Date::FORMAT_SQL,
                '2017-12-31',
            ],
            [
                strtotime('28.02.2018'),
                Date::FORMAT_SQL,
                '2018-01-31',
            ],
            [
                '31.12.2018',
                'Y-m-01',
                '2018-11-01',
            ],
        ];
    }

    /**
     * @param $date
     * @param $expected
     *
     * @dataProvider providerGetQuarter
     */
    public function testGetQuarter($date, $expected): void
    {
        $this->assertEquals($expected, Date::getQuarter($date));
    }

    /**
     * @return array
     */
    public function providerGetQuarter(): array
    {
        return [
            [
                '01.01.2018 00:00:00',
                1,
            ],
            [
                '2018-03-31',
                1,
            ],
            [
                '31.12.2018',
                4,
            ],
        ];
    }

    /**
     * @param $numberMonth
     * @param $expected
     *
     * @dataProvider providerGetQuarterByMonth
     */
    public function testGetQuarterByMonth($numberMonth, $expected): void
    {
        $this->assertEquals($expected, Date::getQuarterByNumberMonth($numberMonth));
    }

    /**
     * @return array
     */
    public function providerGetQuarterByMonth(): array
    {
        return [
            [
                1,
                1,
            ],
            [
                3,
                1,
            ],
            [
                12,
                4,
            ],
        ];
    }

    /**
     * @param $date
     * @param int $day
     * @param string $format
     * @param $expected
     *
     * @dataProvider providerChangeDays
     */
    public function testChangeDays($date, int $day, string $format, $expected): void
    {
        $this->assertEquals($expected, Date::changeDay($date, $day, $format));
    }

    /**
     * @return array
     */
    public function providerChangeDays(): array
    {
        return [
            [
                '01.01.2018 00:00:00',
                -1,
                Date::FORMAT_SQL,
                '2017-12-31'
            ],
            [
                '2018-12-31',
                1,
                Date::FORMAT_DEFAULT,
                '01.01.2019'
            ],
            [
                '11.03.2018',
                -11,
                Date::FORMAT_DEFAULT,
                '28.02.2018'
            ],
        ];
    }

    /**
     * @param $date
     * @param $expected
     *
     * @dataProvider providerIsToday
     */
    public function testIsToday($date, $expected): void
    {
        $this->assertEquals($expected, Date::isToday($date));
    }

    /**
     * @return array
     */
    public function providerIsToday(): array
    {
        return [
            [
                '01.01.2018 00:00:00',
                false
            ],
            [
                1519804800,
                false
            ],
            [
                'now',
                true
            ],
        ];
    }

    /**
     * @param $date
     * @param $expected
     *
     * @dataProvider providerCheckDateByTimestamp
     */
    public function testCheckDateByTimestamp($date, $expected): void
    {
        $this->assertEquals($expected, Date::checkDateByTimestamp($date));
    }

    /**
     * @return array
     *
     * @throws Exception
     */
    public function providerCheckDateByTimestamp(): array
    {
        return [
            [
                (new \DateTime('now'))->format('U'),
                true,
            ],
            [
                1,
                true,
            ],
        ];
    }

    /**
     * @param string $timezone
     *
     * @dataProvider providerSetTimezone
     */
    public function testSetTimezone(string $timezone): void
    {
        Date::setTimezone($timezone);
        $this->assertEquals($timezone, date_default_timezone_get());
    }

    /**
     * @return array
     *
     * @throws Exception
     */
    public function providerSetTimezone(): array
    {
        return [
            [Date::DEFAULT_TIMEZONE],
            ['GMT'],
        ];
    }

    /**
     * @param string $timezone
     *
     * @dataProvider providerGetTimezone
     */
    public function testGetTimezone(string $timezone): void
    {
        Date::setTimezone($timezone);
        $this->assertEquals($timezone, Date::getTimezone($timezone));
    }

    /**
     * @return array
     *
     * @throws Exception
     */
    public function providerGetTimezone(): array
    {
        return [
            [Date::DEFAULT_TIMEZONE],
            ['GMT'],
        ];
    }

    /**
     * @param string $timezone
     * @param bool $set
     *
     * @dataProvider providerIsTimezone
     */
    public function testIsTimezone(string $timezone, bool $set): void
    {
        $this->assertEquals($set, Date::isTimezone($timezone));
    }

    /**
     * @return array
     */
    public function providerIsTimezone(): array
    {
        return [
            [
                Date::DEFAULT_TIMEZONE,
                true
            ],
            [
                'GMT',
                false
            ],
        ];
    }
}