<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Fee\Day;

use packages\Domain\Domain\Common\EnumTrait;

class DayType
{
    use EnumTrait;

    const ENUM = [
        'weekday',
        'holiday',
        'movieDay',
    ];

    /** @return array */
    public static function Enum()
    {
        return self::ENUM;
    }

    public static function __callStatic($method)
    {
        return new self($method);
    }
}
