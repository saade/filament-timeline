<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;
use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Media\Video;

class VideoContent extends Content
{
    protected string $view = 'filament-timeline::content.video';

    protected array $videos = [];

    /**
     * @param  array<string|Video>  $images
     */
    public function videos(array $videos): static
    {
        foreach ($videos as $video) {
            if (! $video instanceof Video) {
                $video = Video::make()->src($video);
            }

            $this->videos[] = $video;
        }

        return $this;
    }

    public function video(Video | string $video): static
    {
        if (! $video instanceof Video) {
            $video = Video::make()->src($video);
        }

        $this->videos = [$video];

        return $this;
    }

    public function getVideos(): array
    {
        return $this->videos;
    }
}
