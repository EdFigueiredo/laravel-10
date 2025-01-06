<?php

use App\Http\Controllers\Api\SupportControler;
use Illuminate\Support\Facades\Route;

Route::apiResource('/supports', SupportControler::class);