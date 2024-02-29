<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Concerns;

use Closure;
use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

trait HasContent
{
    protected Content | Closure | null $content = null;

    public function content(Content | Closure $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): ?Content
    {
        $content = $this->evaluate($this->content, [
            'state' => $this->getState(),
        ]);

        if (! $content) {
            return null;
        }

        return $content
            ->container($this->getContainer())
            ->state($this->getState());
    }
}
