<?php

use App\Enums\SupportStatus;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\{SupportController};
use App\Models\Support;
use Illuminate\Support\Facades\Route;

// Route::get('/test', function(){
//     //dd(SupportStatus::cases());
//     dd(array_column(SupportStatus::cases(), 'name'));
// });
//Route::resource('/supports', SupportController::class); // dessa forma ele cria todas as rotas de um crud, mas nao tem controle de varias requsições de um mesmo IP.

Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');

Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');

Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');

Route::get('supports/create', [SupportController::class, 'create'])->name('supports.create');

Route::get('supports/{id}', [SupportController::class, 'show'])->name('supports.show');

Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/contato', [SiteController::class , 'contact']);

Route::get('/', function () { return view('welcome'); });