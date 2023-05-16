<?php

namespace Athphane\Sumtingwong\Tests;

use Athphane\Sumtingwong\SumtingwongServiceProvider;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Athphane\\Sumtingwong\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            SumtingwongServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_sumtingwong_tables.php.stub';
        $migration->up();
    }

    /**
     * Ignore package discovery from.
     *
     * @return array<int, string>
     */
    public function ignorePackageDiscoveriesFrom()
    {
        return ['blade-ui-kit/blade-heroicons'];
    }
}
