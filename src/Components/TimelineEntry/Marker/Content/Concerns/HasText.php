<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Concerns;

use Illuminate\Contracts\Support\Htmlable;

trait HasText
{
    protected string | Htmlable | null $text = null;

    public function text(string | Htmlable | null $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }
}
