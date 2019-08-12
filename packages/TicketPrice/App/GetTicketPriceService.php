<?php
declare(strict_types=1);

namespace TicketPrice\App;

use Exception;
use TicketPrice\App\Request\GetTicketPriceRequest;
use TicketPrice\Domain\Model\Ticket\Ticket;
use TicketPrice\Domain\Model\Ticket\TicketPriceSpecification;
use TicketPrice\Domain\Model\Ticket\TicketRepositoryInterface;

class GetTicketPriceService
{
    /** @var TicketRepositoryInterface  */
    private $ticketRepo;

    public function __construct(TicketRepositoryInterface $ticketRepo)
    {
        $this->ticketRepo = $ticketRepo;
    }

    /**
     * @param GetTicketPriceRequest $getTicketPriceRequest
     * @return string
     * @throws Exception
     */
    public function getPrice(GetTicketPriceRequest $getTicketPriceRequest)
    {
        /** @var Ticket|null $ticket */
        $ticket = $this->ticketRepo->getById($getTicketPriceRequest->ticketId);
        if(is_null($ticket)){
            throw new Exception('該当するチケットがありません。'.
                var_export([$ticket, $getTicketPriceRequest->ticketId], true));
        }

        $spec = new TicketPriceSpecification($getTicketPriceRequest->dateTime);
        $lowestPriceTicket = $ticket->getApplicableLowestPrice($spec);

        return $lowestPriceTicket->amount();
    }
}
