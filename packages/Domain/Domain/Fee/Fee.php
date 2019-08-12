<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Fee;

interface Fee
{
    public function yen();

    public function label();
}
