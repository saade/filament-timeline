<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry;

use Closure;
use Filament\Infolists\Components\Entry;
use Illuminate\Database\Eloquent\Model;

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

    protected Marker\Content | Closure | null $content = null;

    protected bool $contained = false;

    public static function make(string $name = null): static
    {
        $static = app(static::class, ['name' => '']);
        $static->configure();

        return $static;
    }

    public function content(Marker\Content | Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Marker\Content
     */
    public function getContent()
    {
        return $this->evaluate($this->content, [
            'state' => $this->getState(),
        ]);
    }

    public function contained(bool $condition = true): static
    {
        $this->contained = $condition;

        return $this;
    }

    public function isContained(): bool
    {
        return $this->contained;
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
}
