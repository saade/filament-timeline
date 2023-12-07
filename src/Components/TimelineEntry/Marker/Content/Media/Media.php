<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Media;

use Illuminate\Support\Number;

abstract class Media
{
    protected ?string $src = null;

    protected ?string $caption = null;

    protected bool $downloadable = false;

    protected ?string $name = null;

    protected string | int | float | null $size = null;

    public static function make(): static
    {
        $static = app(static::class);

        return $static;
    }

    public function src(string $src): static
    {
        $this->src = $src;

        return $this;
    }

    public function getSrc(): string
    {
        return $this->src;
    }

    public function caption(string $caption): static
    {
        $this->caption = $caption;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function downloadable(bool $downloadable = true): static
    {
        $this->downloadable = $downloadable;

        return $this;
    }

    public function isDownloadable(): bool
    {
        return $this->downloadable;
    }

    public function name(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function size(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getSize(): ?string
    {
        if (! is_numeric($this->size)) {
            return $this->size;
        }

        return Number::fileSize($this->size, precision: 2);
    }
}
