<?php

namespace Saade\FilamentTimeline\Components;

use Closure;
use Filament\Infolists\Components\Entry;

class TimelineEntry extends Entry
{
    protected string $view = 'filament-timeline::timeline';

    protected TimelineEntry\Marker | Closure | null $marker = null;

    public function marker(TimelineEntry\Marker | Closure $marker = null): static
    {
        $this->marker = $marker;

        return $this;
    }

    public function getMarker(array $state): ?TimelineEntry\Marker
    {
        $marker = $this->evaluate($this->marker);

        if (! $marker) {
            return null;
        }

        $marker->state($state);

        return $marker;
    }
}
