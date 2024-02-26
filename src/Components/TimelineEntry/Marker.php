<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry;

use Filament\Infolists\Components\Entry;
use Filament\Support\Concerns\CanBeContained;

class Marker extends Entry
{
    use CanBeContained;
    use Concerns\HasAvatar;
    use Concerns\HasColor;
    use Concerns\HasContent;
    use Concerns\HasHint;
    use Concerns\HasIcon;
    use Concerns\HasLabel;

    protected string $view = 'filament-timeline::marker';

    protected string $viewIdentifier = 'marker';

    public static function make(string $name = null): static
    {
        $static = app(static::class, ['name' => '']);
        $static->configure();

        return $static;
    }
}
