<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ContactController;

Route::get('/',  [ContactController::class, 'index']);
Route::resource('groups', GroupController::class);
Route::get('contacts/json', [ContactController::class, 'json'])->name('contacts.json');
Route::resource('contacts', ContactController::class);

