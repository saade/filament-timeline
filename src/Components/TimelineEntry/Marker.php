<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry;

use Filament\Infolists\Components\Entry;
use Filament\Support\Concerns\CanBeContained;

class Marker extends Entry
{
    use CanBeContained;
    use Concerns\HasAvatar;
    use Concerns\HasColor;
    use Concerns\HasIcon;

    protected string $view = 'filament-timeline::marker';

    protected string $viewIdentifier = 'marker';
}
