<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket\PriceType;

class TicketPriceType
{
    /** @var DayType */
    private $dayType;

    /** @var StartTimeType */
    private $startTimeType;

    /**
     * TicketPriceType constructor.
     * @param DayType $dayType
     * @param StartTimeType $startTimeType
     */
    public function __construct(DayType $dayType, StartTimeType $startTimeType)
    {
        $this->dayType = $dayType;
        $this->startTimeType = $startTimeType;
    }

    public static function of(DayType $dayType, StartTimeType $startTimeType): self
    {
        return new self($dayType, $startTimeType);
    }

    public function dayType(): DayType
    {
        return $this->dayType;
    }

    public function startTImeType(): StartTimeType
    {
        return $this->startTimeType;
    }
}

