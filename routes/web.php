<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::view('/tickets', 'livewire.tickets.index')
    ->middleware(['auth'])
    ->name('tickets.index');


Route::view('/tickets/create', 'livewire.tickets.create')
    ->middleware(['auth'])
    ->name('tickets.create');

Route::view('/tickets/details', 'livewire.tickets.detail')
    ->middleware(['auth'])
    ->name('tickets.detail');


//Route::view('/admin/tickets', 'livewire.admin.tickets.index')
//     ->middleware(['auth', 'admin'])
//     ->name('admin.tickets.index');

Route::view('/admin/tickets', 'livewire.admin.tickets.index')
    ->middleware(['auth', 'admin'])
    ->name('admin.tickets.index');

Route::view('/admin/tickets/details', 'livewire.admin.tickets.detail')
    ->middleware(['auth', 'admin'])
    ->name('admin.tickets.detail');

require __DIR__ . '/auth.php';
