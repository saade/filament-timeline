<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Filament\Infolists\Components\Concerns\HasHint as BaseHasHint;
use Illuminate\Contracts\Support\Htmlable;

trait HasHint
{
    use BaseHasHint {
        getHint as getBaseHint;
    }

    public function getHint(): string | Htmlable | null
    {
        $hint = $this->hint;

        if (is_string($hint) && $this->isStateProperty($hint)) {
            return data_get($this->getState(), $hint);
        }

        return $this->evaluate($hint);
    }
}
