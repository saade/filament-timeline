<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

class TextContent extends Content
{
    use Concerns\HasText;

    protected string $view = 'filament-timeline::content.text';
}
