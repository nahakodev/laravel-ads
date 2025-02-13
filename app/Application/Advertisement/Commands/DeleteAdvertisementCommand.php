<?php

namespace App\Application\Advertisement\Commands;

class DeleteAdvertisementCommand
{
    public string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }
}
