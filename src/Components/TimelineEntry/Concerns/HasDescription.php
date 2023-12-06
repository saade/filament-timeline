<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Filament\Support\Concerns\HasDescription as BaseHasDescription;
use Illuminate\Contracts\Support\Htmlable;

trait HasDescription
{
    use BaseHasDescription;

    public function getDescription(): string | Htmlable | null
    {
        $description = $this->description;

        if (is_string($description) && $this->isStateProperty($description)) {
            return data_get($this->getState(), $description);
        }

        return $this->evaluate($description, [
            'state' => $this->getState(),
        ]);
    }
}
