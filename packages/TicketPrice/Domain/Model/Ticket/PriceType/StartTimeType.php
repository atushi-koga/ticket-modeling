<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket\PriceType;

use TicketPrice\Domain\Common\EnumTrait;

/**
 * @method static self daytime()
 * @method static self late()
 */
class StartTimeType
{
    use EnumTrait;

    const ENUM = [
        'daytime' => 10,
        'late' => 20,
    ];

    public function isDaytime(): bool
    {
        return $this->value() === self::ENUM['daytime'];
    }

    public function isLate(): bool
    {
        return $this->value() === self::ENUM['late'];
    }
}
