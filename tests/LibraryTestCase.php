<?php

namespace Tests;

use App\gds\Library;
use App\gds\Inform;

class LibraryTestCase extends TestCase
{
    protected  ?Library $library = null;

    protected function setUp(): void
    {
        parent::setUp();
        if (! $this->library) {
            $inform = new Inform();
            $inform->gdspath = base_path('resources/seedgds/test.gds');
            $inform->run();
            $this->library = $inform->library;
        }
    }
}
