<?php

namespace Tests;

use Mockery as m;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->init();
    }

    protected function init()
    {
        // Stub/template method - overloadable by children
    }

    protected function getPackageProviders($app)
    {
        return [
            'Collective\Html\HtmlServiceProvider',
            'HamCore\Stylist\StylistServiceProvider',
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Stylist' => 'HamCore\Stylist\Facades\StylistFacade',
            'Theme'   => 'HamCore\Stylist\Facades\ThemeFacade',
        ];
    }

    protected function getApplicationAliases($app)
    {
        $aliases = parent::getApplicationAliases($app);

        $aliases['Stylist'] = 'HamCore\Stylist\Facades\StylistFacade';

        return $aliases;
    }
}
