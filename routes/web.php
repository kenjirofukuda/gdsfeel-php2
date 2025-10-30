<?php

use App\gds\Library;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('view1', [
        'library' => Library::seed_instance()
    ]);
});


Route::get('/structure/{name}', function ($name) {
    $library = Library::seed_instance();
    $structure = $library->structureNamed($name);
    return view('view1', [
        'library' => $library,
        'structure' => $structure,
        'element' => null
    ]);
});


Route::get('/structure/{name}/element/{elkey}', function ($name, $elkey) {
    $library = Library::seed_instance();
    $structure = $library->structureNamed($name) ?? null;
    $element = $structure->elementAtElkey($elkey) ?? null;
    return view('view1', [
        'library' => $library,
        'structure' => $structure,
        'element' => $element
    ]);
});
