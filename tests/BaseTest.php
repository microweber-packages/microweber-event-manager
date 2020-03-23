<?php
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

abstract class BaseTest extends Orchestra\Testbench\TestCase
{

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

       /* $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'sqlite',
            'database'  => ':memory:',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();*/
    }

    public function tearDown(): void
    {
        \Mockery::close();
    }


    protected function getPackageProviders($app)
    {
        return [
            \MicroweberPackages\EventManager\DatabaseManagerServiceProvider::class,
            \MicroweberPackages\Cache\TaggableFileCacheServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'database_manager' => \MicroweberPackages\EventManager\DatabaseManagerFacade::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'tQbgKF5NH5zMyGh4vCNypFAzx9trCkE6x');
        $app['config']->set('database.default', 'testing');

        $app['config']->set('cache.default', 'tfile');
        $app['config']->set('cache.stores.tfile',
            [
                'driver' => 'tfile',
                'path' => storage_path('framework/cache'),
                'separator' => '~#~'
            ]
        );
    }

}