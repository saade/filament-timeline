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
        $color = $this->color;

        if (is_string($color) && $this->isStateProperty($color)) {
            return data_get($this->getState(), $color);
        }

        return $this->getBaseColor($this->getState());
    }
}
