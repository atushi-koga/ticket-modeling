<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket;

class Ticket
{
    /** @var int */
    private $id;

    private $name;

    /** @var TicketPrices */
    private $ticketPrices;

    private $note;

    /**
     * Ticket constructor.
     * @param $id
     * @param $name
     * @param TicketPrices $ticketPrices
     * @param $note
     */
    public function __construct(int $id, string $name, TicketPrices $ticketPrices, string $note)
    {
        $this->id = $id;
        $this->name = $name;
        $this->ticketPrices = $ticketPrices;
        $this->note = $note;
    }

    public static function of(int $id, string $name, TicketPrices $ticketPrices, string $note): self
    {
        return new self($id, $name, $ticketPrices, $note);
    }

    public function id(): int
    {
        return $this->id;
    }


    public function ticketPrices(): TicketPrices
    {
        return $this->ticketPrices;
    }

    public function getApplicableLowestPrice(TicketPriceSpecification $spec): TicketPrice
    {
        return $this->ticketPrices->getApplicableLowestPrice($spec);
    }
}
