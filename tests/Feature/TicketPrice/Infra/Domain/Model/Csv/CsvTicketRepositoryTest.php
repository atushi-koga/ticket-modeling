<?php

namespace Tests\Feature\TicketPrice\Infra\Domain\Model\Csv;

use ReflectionMethod;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use TicketPrice\Domain\Model\Ticket\Ticket;
use TicketPrice\Infra\Domain\Model\Ticket\Csv\CsvTicketRepository;

class CsvTicketRepositoryTest extends TestCase
{
    private $repo;

    public function setUp(): void
    {
        parent::setUp();

        $this->repo = new CsvTicketRepository();
    }

    /**
     * @throws \ReflectionException
     */
    public function testLoad()
    {
        $method = new ReflectionMethod(get_class($this->repo), 'load');
        $method->setAccessible(true);
        $loaded = $method->invoke($this->repo);

        $this->assertEquals(4, count($loaded));

        $firstRow = $loaded[0];
        $this->assertEquals(1, $firstRow[0]);
        $this->assertEquals('一般', $firstRow[1]);
        $this->assertEquals(1800, $firstRow[2]);
        $this->assertEquals(1300, $firstRow[3]);
        $this->assertEquals(1800, $firstRow[4]);
        $this->assertEquals(1300, $firstRow[5]);
        $this->assertEquals(1100, $firstRow[6]);
        $this->assertEquals("", $firstRow[7]);
    }

    public function testGetAll()
    {
        $this->assertEquals(4, count($this->repo->getAll()));
    }

    /**
     * @dataProvider getByIdProvider
     */
    public function testGetById($id)
    {
        /** @var Ticket $ticket */
        $ticket = $this->repo->getById($id);

        $this->assertNotNull($ticket);
        $this->assertEquals($id, $ticket->id());
    }

    public function getByIdProvider()
    {
        return [
            'ticketId = 1' => [1],
            'ticketId = 2' => [2],
            'ticketId = 3' => [3],
            'ticketId = 4' => [4],
        ];
    }
}
