<?php
namespace App\Application\Advertisement\CommandHandlers;

use App\Application\Advertisement\Commands\DeleteAdvertisementCommand;
use App\Domain\Advertisement\Repositories\AdvertisementRepositoryInterface;

class DeleteAdvertisementHandler
{
    private AdvertisementRepositoryInterface $repository;

    public function __construct(AdvertisementRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(DeleteAdvertisementCommand $command): void
    {
        $advertisement = $this->repository->findById($command->id);
        if (!$advertisement) {
            throw new \Exception("Advertisement not found.");
        }

        $this->repository->delete($advertisement);
    }
}
