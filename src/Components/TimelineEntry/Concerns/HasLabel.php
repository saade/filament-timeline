<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Filament\Infolists\Components\Concerns\HasLabel as BaseHasLabel;
use Illuminate\Contracts\Support\Htmlable;

trait HasLabel
{
    use BaseHasLabel {
        getLabel as getBaseLabel;
    }

    public function getLabel(): string | Htmlable | null
    {
        $label = $this->label;

        if (is_string($label)) {
            return $label;
        }

        return $this->getBaseLabel();
    }
}
