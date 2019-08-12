<?php
declare(strict_types=1);

namespace packages\UseCase;

interface FeeCalculationUseCase
{
    public function handler(FeeCalculationRequest $request);
}
