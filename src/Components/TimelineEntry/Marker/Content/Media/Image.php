<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Media;

class Image extends Media
{
    protected ?string $alt = null;

    public function alt(string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }
}
