<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;
use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content\Media\File;

class FileContent extends Content
{
    protected string $view = 'filament-timeline::content.file';

    protected array $files = [];

    /**
     * @param  array<string|File>  $files
     */
    public function files(array $files): static
    {
        foreach ($files as $file) {
            if (! $file instanceof File) {
                $file = File::make()->src($file);
            }

            $this->files[] = $file;
        }

        return $this;
    }

    public function file(File | string $file): static
    {
        if (! $file instanceof File) {
            $file = File::make()->src($file);
        }

        $this->files = [$file];

        return $this;
    }

    public function getFiles(): array
    {
        return $this->files;
    }
}
