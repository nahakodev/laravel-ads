<?php

namespace App\Domain\Advertisement\Entities;

use App\Domain\Advertisement\ValueObjects\Price;

class Advertisement
{
    private string $id;
    private string $title;
    private string $description;
    private string $userId;
    private Price $price;

    public function __construct(
        string $id,
        string $title,
        string $description,
        string $userId,
        Price $price
    ) {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->userId      = $userId;
        $this->price       = $price;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }
}
