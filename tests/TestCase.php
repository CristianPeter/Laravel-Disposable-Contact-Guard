<?php

namespace CristianPeter\LaravelDisposableContactGuard\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @var string
     */
    protected $storagePath = __DIR__.'/domains.json';

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('disposable-email.storage', $this->storagePath);
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->disposable()->flushStorage();
        $this->disposable()->flushCache();
    }

    /**
     * Clean up the testing environment before the next test.
     */
    public function tearDown(): void
    {
        $this->disposable()->flushStorage();
        $this->disposable()->flushCache();

        parent::tearDown();
    }

    /**
     * Package Service Providers
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['CristianPeter\LaravelDisposableContactGuard\DisposableEmailServiceProvider'];
    }

    /**
     * Package Aliases
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return ['Indisposable' => 'CristianPeter\LaravelDisposableContactGuard\Facades\DisposableDomains'];
    }

    /**
     * @return \CristianPeter\LaravelDisposableContactGuard\DisposableDomains
     */
    protected function disposable()
    {
        return $this->app['disposable_email.domains'];
    }
}
