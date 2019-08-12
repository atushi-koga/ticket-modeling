<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket;

use TicketPrice\Domain\Common\DateTime;

class MovieStartDateTime
{
    /** @var DateTime */
    private $value;

    public function __construct(DateTime $value)
    {
        $this->value = $value;
    }

    public static function of(DateTime $value): self
    {
        return new self($value);
    }

    public static function ofByString(string $value): self
    {
        return new self(DateTime::ofByString($value));
    }

    public function value(): DateTime
    {
        return $this->value;
    }

    public function isMovieDay(): bool
    {
        return $this->value->value()->format('j') === '1';
    }

    public function isWeekDay(): bool
    {
        return in_array($this->value->value()->format('w'), ['1', '2', '3', '4', '5']);
    }

    public function isHoliday(): bool
    {
        return in_array($this->value->value()->format('w'), ['0', '6']);
    }

    public function isLateTime(): bool
    {
        return $this->value->isAfter(DateTime::of($this->value->value()->setTime(19, 59, 59)));
    }
}
