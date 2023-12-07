<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

class TextContent extends Content
{
    protected string $view = 'filament-timeline::content.text';

    protected ?string $text = null;

    public function text(?string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }
}
