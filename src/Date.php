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
    public static function getTime($date): ?int
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
    public static function toFormat($date, string $format = self::FORMAT_DEFAULT): ?string
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
    public static function toSQL($date): ?string
    {
        $date = self::getTime($date);

        return  empty($date) ? null : date(self::FORMAT_SQL, $date);
    }
}