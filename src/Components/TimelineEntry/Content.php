<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry;

use Filament\Infolists\Components\Component;

class Content extends Component
{
    public static function make(): static
    {
        $static = app(static::class);
        $static->configure();

        return $static;
    }
}
