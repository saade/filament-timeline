<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Closure;
use Filament\Infolists\Components\Concerns\HasIcon as BaseHasIcon;
use Saade\FilamentTimeline\Components\TimelineEntry\Enums\Size;

trait HasIcon
{
    use BaseHasIcon {
        getIcon as getBaseIcon;
    }

    protected Size | string | Closure | null $iconSize = null;

    public function size(Size | string | Closure | null $size): static
    {
        $this->iconSize = $size;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->getBaseIcon($this->getState());
    }

    public function getIconSize(): Size | string | null
    {
        return $this->evaluate($this->iconSize, [
            'state' => $this->getState(),
        ]);
    }
}
