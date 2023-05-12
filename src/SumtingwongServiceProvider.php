<?php

namespace Athphane\Sumtingwong;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Athphane\Sumtingwong\Commands\SumtingwongCommand;

class SumtingwongServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('sumtingwong')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_sumtingwong_table')
            ->hasCommand(SumtingwongCommand::class);
    }
}
