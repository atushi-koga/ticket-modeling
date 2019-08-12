<?php
declare(strict_types=1);

namespace packages\Domain\Application;

use packages\Domain\Domain\Fee\Fee;
use packages\Domain\Domain\Fee\FeeType;
use packages\UseCase\FeeCalculationRequest;
use packages\UseCase\FeeCalculationUseCase;

class FeeCalculationInteractor implements FeeCalculationUseCase
{
    public function handler(FeeCalculationRequest $request)
    {
        $feeClass = FeeType::of($request->feeType)->value();
        /** @var Fee $feeType */
        $feeType = new $feeClass($request->dayType, $request->timeType);

        $fee = $feeType->yen();

        return $fee;
    }
}
