<?php

use App\gds\Inform;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('view1', [
        'library' => Inform::seed_instance()->library
    ]);
});
