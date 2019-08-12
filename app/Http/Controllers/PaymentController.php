<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TicketPrice\App\GetTicketPriceService;
use TicketPrice\App\Request\GetTicketPriceRequest;

class PaymentController extends Controller
{
    private $service;

    public function __construct(GetTicketPriceService $service)
    {
        $this->service = $service;
    }

    public function fee(Request $request)
    {
        $getTicketPriceRequest = new GetTicketPriceRequest(
            intval($request->input('price_id')),
            intval($request->input('date_time'))
        );

        $price = $this->service->getPrice($getTicketPriceRequest);

        dd($price);
    }
}
