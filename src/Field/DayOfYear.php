<?php

namespace Brick\DateTime\Field;

use Brick\DateTime\DateTimeException;

/**
 * The day-of-year field.
 */
final class DayOfYear
{
    /**
     * The field name.
     */
    const NAME = 'day-of-year';

    /**
     * @param int      $dayOfYear The day-of-year to check.
     * @param int|null $year      An optional year to check against, validated.
     *
     * @return void
     *
     * @throws DateTimeException If the day-of-year is not valid.
     */
    public static function check(int $dayOfYear, int $year = null)
    {
        if ($dayOfYear < 1 || $dayOfYear > 366) {
            throw DateTimeException::fieldNotInRange(self::NAME, $dayOfYear, 1, 366);
        }

        if ($dayOfYear === 366 && $year !== null) {
            if (! Year::isLeap($year)) {
                throw new DateTimeException("Invalid day-of-year 366 as $year is not a leap year");
            }
        }
    }
}
