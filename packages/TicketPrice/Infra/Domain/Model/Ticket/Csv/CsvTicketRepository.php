<?php
declare(strict_types=1);

namespace TicketPrice\Infra\Domain\Model\Ticket\Csv;

use TicketPrice\Domain\Model\Ticket\PriceType\DayType;
use TicketPrice\Domain\Model\Ticket\PriceType\StartTimeType;
use TicketPrice\Domain\Model\Ticket\PriceType\TicketPriceType;
use TicketPrice\Domain\Model\Ticket\Ticket;
use TicketPrice\Domain\Model\Ticket\TicketPrice;
use TicketPrice\Domain\Model\Ticket\TicketPrices;
use TicketPrice\Domain\Model\Ticket\TicketRepositoryInterface;

class CsvTicketRepository implements TicketRepositoryInterface
{
    /**
     * @return Ticket[]
     */
    public function getAll(): array
    {
        $loadedData = $this->load();

        return array_map(function ($row) {
            return Ticket::of(intval($row[0]), $row[1], $this->makeTicketPrices($row), $row[7]);
        }, $loadedData);
    }

    public function getById(int $id): ?Ticket
    {
        $tickets = array_filter(
            $this->getAll(),
            function (/** @var Ticket $ticket */ $ticket) use ($id): bool {
                return $ticket->id() === $id;
            });

        return array_shift($tickets);
    }

    private function makeTicketPrices(array $row): TicketPrices
    {
        return TicketPrices::of([
            TicketPrice::of(
                intval($row[2]),
                TicketPriceType::of(DayType::weekday(), StartTimeType::daytime())
            ),
            TicketPrice::of(
                intval($row[3]),
                TicketPriceType::of(DayType::weekday(), StartTimeType::late())
            ),
            TicketPrice::of(
                intval($row[4]),
                TicketPriceType::of(DayType::holiday(), StartTimeType::daytime())
            ),
            TicketPrice::of(
                intval($row[5]),
                TicketPriceType::of(DayType::holiday(), StartTimeType::late())
            ),
            TicketPrice::of(
                intval($row[6]),
                TicketPriceType::of(DayType::movieDay(), StartTimeType::daytime())
            ),
            TicketPrice::of(
                intval($row[6]),
                TicketPriceType::of(DayType::movieDay(), StartTimeType::late())
            ),
        ]);
    }

    private function load(): array
    {
        $data = [];

        $handle = fopen(__DIR__.'/ticket.csv', 'r');
        while ($row = fgetcsv($handle)) {
            $data[] = $row;
        }
        fclose($handle);

        return $data;
    }
}
