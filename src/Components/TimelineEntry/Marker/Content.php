<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker;

use Filament\Infolists\Components\Component;

abstract class Content extends Component
{
    protected string $viewIdentifier = 'content';

    public static function make(): static
    {
        $static = app(static::class);
        $static->configure();

        return $static;
    }
}
