<?php

namespace Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

use Filament\Infolists\Components\Component;
use Filament\Infolists\Concerns\HasComponents;
use Saade\FilamentTimeline\Components\TimelineEntry\Marker\Content;

class InfolistContent extends Content
{
    use HasComponents;

    protected string $view = 'filament-infolists::component-container';

    /**
     * @return array<Component>
     */
    public function getComponents(bool $withHidden = false): array
    {
        $components = array_map(function (Component $component): Component {
            $component->container(
                $this->getContainer()->getClone()
            );

            return $component;
        }, $this->evaluate($this->components));

        if ($withHidden) {
            return $components;
        }

        return array_filter(
            $components,
            fn (Component $component) => $component->isVisible(),
        );

    }
}
