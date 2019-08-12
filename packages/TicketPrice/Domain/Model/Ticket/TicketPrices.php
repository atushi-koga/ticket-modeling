<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket;

class TicketPrices
{
    /** @var TicketPrice[] */
    private $prices;

    /**
     * TicketPrices constructor.
     * @param TicketPrice[] $ticketPriceArray
     */
    public function __construct(array $ticketPriceArray)
    {
        $this->prices = $ticketPriceArray;
    }

    /**
     * @param TicketPrice[] $ticketPriceArray
     * @return TicketPrices
     */
    public static function of(array $ticketPriceArray): self
    {
        return new self($ticketPriceArray);
    }

    public function getApplicableLowestPrice(TicketPriceSpecification $spec): TicketPrice
    {
        $result = null;
        $lowestPrice = PHP_INT_MAX;
        foreach ($this->getApplicablePrice($spec)->prices as $price) {
            if ($price->amount() < $lowestPrice) {
                $result = $price;
                $lowestPrice = $price->amount();
            }
        }

        return $result;
    }

    public function getApplicablePrice(TicketPriceSpecification $spec): self
    {
        return new self(
            array_filter($this->prices, function ($price) use ($spec) {
                return $spec->isSatisfiedBy($price);
            })
        );
    }
}
