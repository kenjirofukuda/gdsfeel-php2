<?php

use App\gds\Inform;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('view1', [
        'library' => Inform::seed_instance()->library
    ]);
});


Route::get('/structure/{name}', function ($name) {
    $library = Inform::seed_instance()->library;
    $structure = $library->structureNamed($name);
    return view('view1', [
        'library' => $library,
        'structure' => $structure
    ]);
});


Route::get('/structure/{name}/element/{elkey}', function ($name, $elkey) {
    $library = Inform::seed_instance()->library;
    $structure = $library->structureNamed($name) ?? null;
    $element = $structure->elementAtElkey($elkey) ?? null;
    return view('view1', [
        'library' => $library,
        'structure' => $structure,
        'element' => $element
    ]);
});
