<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Advertisement\Entities\Advertisement;
use App\Domain\Advertisement\Repositories\AdvertisementRepositoryInterface;
use App\Domain\Advertisement\ValueObjects\Price;
use App\Models\Advertisement as AdvertisementModel;

class EloquentAdvertisementRepository implements AdvertisementRepositoryInterface
{
    public function findById(string $id): ?Advertisement
    {
        $model = AdvertisementModel::find($id);
        if (!$model) {
            return null;
        }

        return new Advertisement(
            $model->id,
            $model->title,
            $model->description,
            $model->user_id,
            new Price((float) $model->price)
        );
    }

    public function save(Advertisement $advertisement): void
    {
        $model = new AdvertisementModel();
        $model->id          = $advertisement->getId();
        $model->title       = $advertisement->getTitle();
        $model->description = $advertisement->getDescription();
        $model->user_id     = $advertisement->getUserId();
        $model->price       = $advertisement->getPrice()->getValue();
        $model->save();
    }

    public function delete(Advertisement $advertisement): void
    {
        $model = \App\Models\Advertisement::find($advertisement->getId());
        if ($model) {
            $model->delete();
        }
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return AdvertisementModel::all();
    }

    public function getAllUserAds(string $id): \Illuminate\Database\Eloquent\Collection
    {
        return AdvertisementModel::where('user_id', $id)->get();
    }
}
