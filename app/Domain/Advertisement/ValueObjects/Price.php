<?php

namespace App\Domain\Advertisement\ValueObjects;

class Price
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException("Price must be a positive value.");
        }
        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
