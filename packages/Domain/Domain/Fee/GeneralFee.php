<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Fee;

use packages\Domain\Domain\Fee\Day\DayType;

class GeneralFee implements Fee
{
    /** @var DayType */
    private $dayType;

    private $timeType;

    const LABEL = '一般';

    public function __construct($dayType, $timeType)
    {
        $this->dayType = new DayType($dayType);
        $this->timeType = $timeType;
    }

    public function yen()
    {
        return $this->feeCalculation();
    }

    public function label()
    {
        return self::LABEL;
    }

    private function feeCalculation()
    {
        if ($this->dayType == DayType::movieDay()) {
            return $this->movieDayFee();
        }

        if ($this->dayType == DayType::weekday()) {
            return $this->weekdayFee();
        }

        return $this->holidayFee();
    }

    private function movieDayFee(): int
    {
        return 1100;
    }

    private function weekdayFee(): int
    {
        if ($this->timeType === 'dayTime') {
            return 1800;
        }

        return 1300;
    }

    private function holidayFee(): int
    {
        if ($this->timeType === 'dayTime') {
            return 1000;
        }

        return 1000;
    }
}
