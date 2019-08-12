<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use packages\UseCase\FeeCalculationRequest;
use packages\UseCase\FeeCalculationUseCase;

class PaymentController extends Controller
{
    /** @var FeeCalculationUseCase */
    private $feeCalculator;

    public function __construct(FeeCalculationUseCase $feeCalculationUseCase)
    {
        $this->feeCalculator = $feeCalculationUseCase;
    }

    public function fee(Request $request)
    {
        $calculationRequest = new FeeCalculationRequest(
            $request->input('fee_type'),
            $request->input('day_type'),
            $request->input('time_type')
        );

        $fee = $this->feeCalculator->handler($calculationRequest);

        dd($fee);
    }
}
