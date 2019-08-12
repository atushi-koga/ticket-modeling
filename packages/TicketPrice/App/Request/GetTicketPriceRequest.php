<?php
declare(strict_types=1);

namespace TicketPrice\App\Request;

use TicketPrice\Domain\Model\Ticket\MovieStartDateTime;

class GetTicketPriceRequest
{
    /** @var int */
    public $ticketId;

    /** @var MovieStartDateTime */
    public $dateTime;

    public function __construct(int $ticketId, string $dateTime)
    {
        $this->ticketId = $ticketId;
        $this->dateTime = MovieStartDateTime::ofByString($dateTime);
    }
}
