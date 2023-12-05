<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Filament\Support\Concerns\HasDescription as BaseHasDescription;
use Illuminate\Contracts\Support\Htmlable;

trait HasDescription
{
    use BaseHasDescription;

    public function getDescription(): string | Htmlable | null
    {
        return $this->evaluate($this->description, [
            'state' => $this->getState(),
        ]);
    }
}
