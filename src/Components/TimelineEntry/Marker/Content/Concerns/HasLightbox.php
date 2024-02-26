<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Concerns;

use Closure;

trait HasLightbox
{
    protected bool | Closure $lightbox = false;

    protected string | Closure | null $gallery = null;

    public function lightbox(bool | Closure $condition = true): static
    {
        $this->lightbox = $condition;

        return $this;
    }

    public function hasLightbox(): bool
    {
        return $this->evaluate($this->lightbox);
    }

    public function gallery(string | Closure $gallery): static
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function getGallery(): ?string
    {
        return $this->evaluate($this->gallery);
    }
}
