<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;
use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Media\Image;

class ImageContent extends Content
{
    use Concerns\HasLightbox;
    use Concerns\HasText;

    protected string $view = 'filament-timeline::content.image';

    protected array $images = [];

    /**
     * @param  array<string|Image>  $images
     */
    public function images(array $images): static
    {
        foreach ($images as $image) {
            if (! $image instanceof Image) {
                $image = Image::make()->src($image);
            }

            $this->images[] = $image;
        }

        return $this;
    }

    public function image(Image | string $image): static
    {
        if (! $image instanceof Image) {
            $image = Image::make()->src($image);
        }

        $this->images = [$image];

        return $this;
    }

    public function getImages(): array
    {
        return $this->images;
    }
}
