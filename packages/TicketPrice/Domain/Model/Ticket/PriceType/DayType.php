<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket\PriceType;

use TicketPrice\Domain\Common\EnumTrait;

/**
 * @method static self weekday()
 * @method static self holiday()
 * @method static self movieDay()
 */
class DayType
{
    use EnumTrait;

    const ENUM = [
        'weekday' => 10,
        'holiday' => 20,
        'movieDay' => 30,
    ];

    public function isWeekday()
    {
        return $this->value() === self::ENUM['weekday'];
    }

    public function isHoliday()
    {
        return $this->value() === self::ENUM['holiday'];
    }

    public function isMovieDay()
    {
        return $this->value() === self::ENUM['movieDay'];
    }
}
