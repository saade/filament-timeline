<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry;

use Closure;
use Filament\Infolists\Components\Component;
use Filament\Infolists\Components\Concerns as Infolists;

class Marker extends Component
{
    use Concerns\HasAvatar;
    use Concerns\HasColor;
    use Concerns\HasDescription;
    use Concerns\HasIcon;
    use Infolists\HasHelperText;
    use Infolists\HasHint;

    protected Content | Closure | null $content = null;

    public static function make(): static
    {
        $static = app(static::class);
        $static->configure();

        return $static;
    }

    public function content(Content | Closure $content = null): static
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(array $state): ?Content
    {
        $content = $this->evaluate($this->content);

        if (! $content) {
            return null;
        }

        $content->state($state);

        return $content;
    }
}
