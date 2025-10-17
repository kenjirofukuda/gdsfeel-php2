<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('view1');
});

$inform = new App\gds\Inform;
// var_dump($inform);
