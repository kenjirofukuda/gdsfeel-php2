<?php

test('example', function () {
    expect(true)->toBeTrue();
});

use \App\gds\Inform;

beforeEach(function () {
    // This expensive object is created only once
    // $this->sharedInstance = new Inform();
    $inform = new Inform();
    $inform->gdspath = base_path('resources/seedgds/test.gds');
    $inform->run();
    $this->library = $inform->library;
});

test('sharedLibrary not null', function () {
    expect($this->library)->not->tobeNull();
});
