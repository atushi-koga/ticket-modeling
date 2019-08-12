<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Fee;

use packages\Domain\Domain\Common\EnumTrait;

class FeeType
{
    use EnumTrait;

    const ENUM = [
        'general' => GeneralFee::class,
        'general-senior' => '',
//        'university-student' => '',
//        'school-student' => '',
//        'junior' => '',
    ];

    /** @return array */
    public static function Enum()
    {
        return self::ENUM;
    }
}
