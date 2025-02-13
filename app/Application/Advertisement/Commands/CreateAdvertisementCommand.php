<?php

namespace App\Application\Advertisement\Commands;

class CreateAdvertisementCommand
{
    public string $title;
    public string $description;
    public string $userId;
    public float $price;

    public function __construct(
        string $title,
        string $description,
        string $userId,
        float $price
    ) {
        $this->title       = $title;
        $this->description = $description;
        $this->userId      = $userId;
        $this->price       = $price;
    }
}
