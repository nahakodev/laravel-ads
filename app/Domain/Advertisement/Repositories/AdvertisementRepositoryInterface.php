<?php

namespace App\Domain\Advertisement\Repositories;

use App\Domain\Advertisement\Entities\Advertisement;

interface AdvertisementRepositoryInterface
{
    public function findById(string $id): ?Advertisement;
    public function getAll();
    public function getAllUserAds(string $id);
    public function save(Advertisement $advertisement): void;

    public function delete(Advertisement $advertisement): void;
}
