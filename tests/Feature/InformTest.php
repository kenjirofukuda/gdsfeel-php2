<?php

use App\gds\Inform;

//use function Pest\beforeAll;

beforeAll(function () {
    // This expensive object is created only once
    // $this->sharedInstance = new Inform();
});

test('raise Exception on missing attribute gdspath ', function () {
    $this->withoutExceptionHandling();

    $inform = new Inform();
    $this->expectException(\Exception::class);
    $this->expectExceptionMessage('not found');
    $inform->run();
});


test('raise Exception on non gdsfile specified ', function () {
    $this->withoutExceptionHandling();

    $inform = new Inform();
    $inform->gdspath = base_path('resources/js/app.js');
    $this->expectException(\Exception::class);
    $inform->run();
});

test('seedgds accessable', function () {
    $this->assertFileExists(base_path('resources/seedgds/test.gds'));
});


test('correct convert to libray', function () {
    $inform = new Inform();
    $inform->gdspath = base_path('resources/seedgds/test.gds');
    $inform->run();
    $this->assertIsObject($inform->library);
});

