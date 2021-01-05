<?php

namespace JamesBhatta\Laravatar\Tests;

use JamesBhatta\Laravatar\LaravatarServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp():void
    {
        parent::setUp();
    }

    public function getPackageProviders($app)
    {
            return [
                LaravatarServiceProvider::class
            ];
    }

    public function getEnvironmentSetUp($app)
    {
        // 
    }
}