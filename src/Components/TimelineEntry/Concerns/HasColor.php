<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Filament\Infolists\Components\Concerns\HasColor as BaseHasColor;

trait HasColor
{
    use BaseHasColor {
        getColor as getBaseColor;
    }

    public function getColor(): ?string
    {
        return $this->getBaseColor($this->getState());
    }
}
