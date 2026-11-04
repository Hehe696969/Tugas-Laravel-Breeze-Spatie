<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen buku
    Route::resource('bukus', BukuController::class);

    // Manajemen pengguna khusus Admin
    Route::middleware(['role:Admin', 'permission:manage users'])->group(function () {
        Route::resource('users', UserRoleController::class)
            ->only(['index', 'edit', 'update']);
    });
});

require __DIR__.'/auth.php';