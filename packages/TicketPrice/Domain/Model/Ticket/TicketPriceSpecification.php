<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket;

class TicketPriceSpecification
{
    /** @var MovieStartDateTime */
    private $startTime;

    public function __construct(MovieStartDateTime $startTime)
    {
        $this->startTime = $startTime;
    }

    public function isSatisfiedBy(TicketPrice $ticketPrice): bool
    {
        return $this->isMovieDayDayTimePrice($ticketPrice)
            || $this->isMovieDayLateTimePrice($ticketPrice)
            || $this->isWeekdayDayTimePrice($ticketPrice)
            || $this->isWeekdayDayLatePrice($ticketPrice)
            || $this->isHolidayDaytimePrice($ticketPrice)
            || $this->isHolidayLatePrice($ticketPrice);
    }

    private function isMovieDayDayTimePrice(TicketPrice $price): bool
    {
        return $this->startTime->isMovieDay()
            && !$this->startTime->isLateTime()
            && $price->priceType()->dayType()->isMovieDay()
            && $price->priceType()->startTImeType()->isDaytime();
    }

    private function isMovieDayLateTimePrice(TicketPrice $price): bool
    {
        return $this->startTime->isMovieDay()
            && $this->startTime->isLateTime()
            && $price->priceType()->dayType()->isMovieDay()
            && $price->priceType()->startTImeType()->isLate();
    }

    private function isWeekdayDayTimePrice(TicketPrice $price): bool
    {
        return $this->startTime->isWeekDay()
            && !$this->startTime->isLateTime()
            && $price->priceType()->dayType()->isWeekday()
            && $price->priceType()->startTImeType()->isDaytime();
    }

    private function isWeekdayDayLatePrice(TicketPrice $price): bool
    {
        return $this->startTime->isWeekDay()
            && $this->startTime->isLateTime()
            && $price->priceType()->dayType()->isWeekday()
            && $price->priceType()->startTImeType()->isLate();
    }

    private function isHolidayDaytimePrice(TicketPrice $price): bool
    {
        return $this->startTime->isHoliday()
            && !$this->startTime->isLateTime()
            && $price->priceType()->dayType()->isHoliday()
            && $price->priceType()->startTImeType()->isDaytime();
    }

    private function isHolidayLatePrice(TicketPrice $price): bool
    {
        return $this->startTime->isHoliday()
            && $this->startTime->isLateTime()
            && $price->priceType()->dayType()->isHoliday()
            && $price->priceType()->startTImeType()->isLate();
    }
}
