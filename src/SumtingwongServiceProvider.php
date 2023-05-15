<?php

namespace Athphane\Sumtingwong;

use Athphane\Sumtingwong\Models\SumtingwongRecord;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasRoute('web')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishMigrations()
                    ->publishConfigFile();
            });
    }
}
