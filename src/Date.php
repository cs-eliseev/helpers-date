<?php

declare(strict_types = 1);

namespace cse\helpers;

/**
 * Class Date
 *
 * @package cse\helpers
 */
class Date
{
    const FORMAT_SQL = 'Y-m-d';
    const FORMAT_DEFAULT = 'd.m.Y';

    /**
     * Get time by date
     *
     * @param $date
     * @return int|null
     */
    public static function getTime($date = 'now'): ?int
    {
        if (is_string($date)) {
            $date = strtotime($date);
        } elseif (!is_int($date)) {
            return null;
        }

        if ($date < 0) return null;

        return (int) $date;
    }

    /**
     * Convert date to format
     *
     * @param $date
     * @param string $format
     * @return null|string
     */
    public static function toFormat($date = 'now', string $format = self::FORMAT_DEFAULT): ?string
    {
        $date = self::getTime($date);

        return empty($date) ? null : date($format, $date);
    }

    /**
     * Convert date to SQL
     *
     * @param $date
     * @return null|string
     */
    public static function toSQL($date = 'now'): ?string
    {
        $date = self::getTime($date);

        return  empty($date) ? null : date(self::FORMAT_SQL, $date);
    }

    /**
     * Diff dates
     *
     * @param $firstDate
     * @param $secondDate
     * @param string $type
     * @return null|string
     */
    public static function diff($firstDate, $secondDate = 'now', string $type = '%d'): ?string
    {
        $firstDate = self::getTime($firstDate);
        $secondDate = self::getTime($secondDate);

        if (empty($secondDate) || empty($firstDate)) return null;

        if ($firstDate > $secondDate) {
            $startDate = new \DateTime(date('Y-m-d H:i:s', $firstDate));
            $endDate = new \DateTime(date('Y-m-d H:i:s', $secondDate));
        } else {
            $startDate = new \DateTime(date('Y-m-d H:i:s', $secondDate));
            $endDate = new \DateTime(date('Y-m-d H:i:s', $firstDate));
        }


        return $endDate->diff($startDate)->format($type);
    }

    /**
     * Get current date
     *
     * @param string $format
     * @return string
     */
    public static function current(string $format = self::FORMAT_DEFAULT): string
    {
        return date($format);
    }

    /**
     * Get date last month by date
     * format = 'Y-m-01' - fist day
     * format = 'Y-m-d' - last day
     *
     * @param $date
     * @param string $format
     * @return null|string
     */
    public static function extremeMonthDate($date = 'now', string $format = self::FORMAT_SQL): ?string
    {
        $date = self::getTime($date);

        return empty($date) ? null : date($format, strtotime(date('Y-m-01 00:00:00', $date)) - 1);
    }

    /**
     * Get quarter by date
     *
     * @param $date
     * @return null|int
     */
    public static function getQuarter($date = 'now'): ?int
    {
        $date = self::getTime($date);

        return empty($date) ? null : (int) ceil(date('n', $date) / 3);
    }

    /**
     * Get quarter by month
     *
     * @param $numberMonth
     * @return int
     */
    public static function getQuarterByNumberMonth($numberMonth): int
    {
        return (int) ceil((int) $numberMonth / 3);
    }

    /**
     * Change days
     *
     * @param $date
     * @param $day
     * @param string $format
     * @return string
     */
    public static function changeDay($date, $day, string $format = self::FORMAT_DEFAULT): string
    {
        return date($format, strtotime($date . ' ' . ($day >= 0 ? '+' . $day : $day) . ' day'));
    }

    /**
     * Is today date
     *
     * @param $date
     * @return bool
     */
    public static function isToday($date): bool
    {
        return self::toSQL($date) == date(self::FORMAT_SQL);
    }

    /**
     * Check date by timestemp
     *
     * @param int $timestemp
     * @return bool
     */
    public static function checkDateByTimestamp(int $timestemp): bool
    {
        $arDate = explode('/', date('Y/m/d', $timestemp));
        return checkdate((int) $arDate[1], (int) $arDate[2], (int) $arDate[0]);
    }
}