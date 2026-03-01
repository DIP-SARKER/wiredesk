<?php

use App\Models\Ticket;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('/tickets', 'tickets.index')
    ->middleware(['auth'])
    ->name('tickets.index');


Route::view('/tickets/create', 'tickets.create')
    ->middleware(['auth'])
    ->name('tickets.create');

// Route::view('/tickets/{ticket}', 'livewire.tickets.detail')
//     ->middleware(['auth'])
//     ->name('tickets.detail');

Route::middleware('auth')->group(function () {


    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/tickets/{ticket}', function (Ticket $ticket) {
        return view('tickets.detail', compact('ticket'));
    })->name('tickets.detail');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/tickets/{ticket}', function (Ticket $ticket) {
        return view('admin.tickets.detail', compact('ticket'));
    })->name('admin.tickets.detail');
});

//Route::view('/admin/tickets', 'livewire.admin.tickets.index')
//     ->middleware(['auth', 'admin'])
//     ->name('admin.tickets.index');

Route::view('/admin/tickets', 'admin.tickets.index')
    ->middleware(['auth', 'admin'])
    ->name('admin.tickets.index');

Route::view('/admin/tickets/details', 'livewire.admin.tickets.detail')
    ->middleware(['auth', 'admin'])
    ->name('admin.tickets.detail');

require __DIR__ . '/auth.php';
