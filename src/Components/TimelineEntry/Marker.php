<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry;

use Filament\Infolists\Components\Entry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Marker extends Entry
{
    use Concerns\HasAvatar;
    use Concerns\HasColor;
    use Concerns\HasDescription;
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

    public function getState(): mixed
    {
        if ($this->getStateUsing !== null) {
            $state = $this->evaluate($this->getStateUsing);
        } else {
            $state = data_get($this->getContainer()->getState(), $this->getStatePath());

            $state = $state instanceof Model ? $this->getStateFromRecord($state) : $state;
        }

        if (blank($state)) {
            $state = $this->getDefaultState();
        }

        return $state;
    }

    public function isStateProperty(string $property): bool
    {
        return in_array(
            $property,
            array_keys(Arr::dot($this->getState()))
        );
    }
}
