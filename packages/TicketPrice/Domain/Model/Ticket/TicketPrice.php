<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket;

use TicketPrice\Domain\Model\Ticket\PriceType\TicketPriceType;

class TicketPrice
{
    private $amount;

    /** @var TicketPriceType */
    private $priceType;

    /**
     * TicketPrice constructor.
     * @param $amount
     * @param TicketPriceType $priceType
     */
    public function __construct(int $amount, TicketPriceType $priceType)
    {
        $this->amount = $amount;
        $this->priceType = $priceType;
    }

    public static function of(int $amount, TicketPriceType $priceType): self
    {
        return new self($amount, $priceType);
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function priceType(): TicketPriceType
    {
        return $this->priceType;
    }

}
