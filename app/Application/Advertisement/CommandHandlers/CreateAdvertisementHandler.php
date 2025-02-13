<?php

namespace App\Application\Advertisement\CommandHandlers;

use App\Application\Advertisement\Commands\CreateAdvertisementCommand;
use App\Domain\Advertisement\Entities\Advertisement;
use App\Domain\Advertisement\Repositories\AdvertisementRepositoryInterface;
use App\Domain\Advertisement\ValueObjects\Price;
use Illuminate\Support\Str;

class CreateAdvertisementHandler
{
    private AdvertisementRepositoryInterface $advertisementRepository;

    public function __construct(AdvertisementRepositoryInterface $advertisementRepository)
    {
        $this->advertisementRepository = $advertisementRepository;
    }

    public function handle(CreateAdvertisementCommand $command): Advertisement
    {
        $id = (string) Str::uuid();

        $advertisement = new Advertisement(
            $id,
            $command->title,
            $command->description,
            $command->userId,
            new Price($command->price)
        );

        $this->advertisementRepository->save($advertisement);

        return $advertisement;
    }
}
