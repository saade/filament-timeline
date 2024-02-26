<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Concerns;

trait HasText
{
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
