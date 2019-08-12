<?php

namespace TicketPrice\Infra\Domain\Model\Ticket;

use Illuminate\Support\ServiceProvider;
use TicketPrice\Domain\Model\Ticket\TicketRepositoryInterface;
use TicketPrice\Infra\Domain\Model\Ticket\Csv\CsvTicketRepository;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TicketRepositoryInterface::class, CsvTicketRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
