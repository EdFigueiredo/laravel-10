<?php

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\{SupportController};
use App\Models\Support;
use Illuminate\Support\Facades\Route;

Route::post('/supports', [SupportController::class, 'store'])->name('supports/store');

Route::get('supports/create', [SupportController::class, 'create'])->name('supports.create');

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/', function () { return view('welcome'); });

Route::get('/contato', [SiteController::class , 'contact']);