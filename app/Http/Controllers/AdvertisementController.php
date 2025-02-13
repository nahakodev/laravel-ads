<?php

namespace App\Http\Controllers;

use App\Application\Advertisement\CommandHandlers\DeleteAdvertisementHandler;
use App\Application\Advertisement\Commands\DeleteAdvertisementCommand;
use App\Domain\Advertisement\Repositories\AdvertisementRepositoryInterface;
use Illuminate\Http\Request;
use App\Application\Advertisement\Commands\CreateAdvertisementCommand;
use App\Application\Advertisement\CommandHandlers\CreateAdvertisementHandler;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdvertisementController extends Controller
{
    private CreateAdvertisementHandler $createHandler;
    private DeleteAdvertisementHandler $deleteHandler;
    private AdvertisementRepositoryInterface $advertisementRepository;

    public function __construct(
        CreateAdvertisementHandler $createHandler,
        DeleteAdvertisementHandler $deleteHandler,
        AdvertisementRepositoryInterface $advertisementRepository
    )
    {
        $this->createHandler = $createHandler;
        $this->deleteHandler = $deleteHandler;
        $this->advertisementRepository = $advertisementRepository;
    }

    public function index()
    {
        $advertisements = $this->advertisementRepository->getAll();
        return Inertia::render('Ads/Index', [
            'ads' => $advertisements
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        $command = new CreateAdvertisementCommand(
            $validatedData['title'],
            $validatedData['description'],
            $user->id,
            $validatedData['price']
        );

        $this->createHandler->handle($command);

        return Inertia::location('/dashboard/advertisements');
    }

    public function delete(string $id): \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        $user = Auth::user();

        $advertisement = $this->advertisementRepository->findById($id);

        if (!$advertisement) {
            return response()->json(['message' => 'Advertisement not found'], 404);
        }

        if ($advertisement->getUserId() != $user->id) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        $command = new DeleteAdvertisementCommand($id);
        $this->deleteHandler->handle($command);

        return Inertia::location('/dashboard/advertisements');
    }

    public function profileAdsPage(): \Inertia\Response
    {
        $user = Auth::user();
        $advertisements = $this->advertisementRepository->getAllUserAds($user->id);

        return Inertia::render('Ads/MyAdvertisements', [
            'ads' => $advertisements
        ]);
    }

    public function createProfileAdPage(): \Inertia\Response
    {
        return Inertia::render('Ads/Create');
    }

}
