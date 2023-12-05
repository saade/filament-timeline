<?php

namespace Saade\FilamentTimeline\Commands;

use Illuminate\Console\Command;

class FilamentTimelineCommand extends Command
{
    public $signature = 'filament-timeline';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
