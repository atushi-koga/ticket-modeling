<?php
declare(strict_types=1);

namespace TicketPrice\Domain\Model\Ticket;

interface TicketRepositoryInterface
{
    public function getAll();

    public function getById(int $id);
}
