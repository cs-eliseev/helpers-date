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
    /**
     * Get time by date
     *
     * @param $date
     * @return int|null
     */
    public static function getTimeByDate($date): ?int
    {
        if (is_string($date)) {
            $date = strtotime($date);
        } elseif (!is_int($date)) {
            return null;
        }

        if ($date < 0) return null;

        return (int) $date;
    }
}