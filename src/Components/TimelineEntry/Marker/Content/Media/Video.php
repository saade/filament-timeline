<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Media;

class Video extends Media
{
    protected bool $controls = false;

    protected ?string $poster = null;

    public function controls(bool $controls = true): self
    {
        $this->controls = $controls;

        return $this;
    }

    public function getControls(): bool
    {
        return $this->controls;
    }

    public function poster(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }
}
