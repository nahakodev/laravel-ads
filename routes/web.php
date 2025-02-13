<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdvertisementController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [AdvertisementController::class, 'index'])->name('ads.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::post('/ads', [AdvertisementController::class, 'store'])->name('ads.store');
    Route::delete('/ads/{id}', [AdvertisementController::class, 'delete'])->name('ads.delete');

    Route::get('/dashboard/advertisements',[AdvertisementController::class, 'profileAdsPage'])->name('profile.ads');
    Route::get('/dashboard/advertisements/create',[AdvertisementController::class, 'createProfileAdPage'])->name('profile.ads.create');
});

require __DIR__.'/auth.php';
