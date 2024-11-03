<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ChatController::class, 'loadDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/check-channel', [ChatController::class, 'checkChannel'])->name('check-channel');
Route::get('/create-channel', [ChatController::class, 'createChannel'])->name('create-channel');
Route::post('/chat/store', [ChatController::class, 'store'])->name('chat.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar'); 
});

require __DIR__.'/auth.php';
