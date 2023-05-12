<?php

namespace Athphane\Sumtingwong\Commands;

use Illuminate\Console\Command;

class SumtingwongCommand extends Command
{
    public $signature = 'sumtingwong';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
