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

    public function getContent(): Content
    {
        return $this->evaluate($this->content, [
            'state' => $this->getState(),
        ]);
    }
}
