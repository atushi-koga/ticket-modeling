<?php
declare(strict_types=1);

namespace packages\UseCase;

class FeeCalculationRequest
{
    public $feeType;

    public $dayType;

    public $timeType;

    public function __construct($feeType, $dayType, $timeType)
    {
        $this->feeType = $feeType;
        $this->dayType = $dayType;
        $this->timeType = $timeType;
    }
}
