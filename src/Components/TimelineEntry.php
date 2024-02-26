<?php

namespace Saade\FilamentTimeline\Components;

use Filament\Infolists\Components\Entry;
use Illuminate\Database\Eloquent\Model;

class TimelineEntry extends Entry
{
    protected string $view = 'filament-timeline::timeline';

    public function marker(TimelineEntry\Marker $marker): static
    {
        $this->childComponents([$marker]);

        return $this;
    }

    /**
     * @return array<ComponentContainer>
     */
    public function getChildComponentContainers(bool $withHidden = false): array
    {
        if ((! $withHidden) && $this->isHidden()) {
            return [];
        }

        $containers = [];

        foreach ($this->getState() ?? [] as $itemKey => $itemData) {
            $container = $this
                ->getChildComponentContainer()
                ->getClone()
                ->statePath($itemKey)
                ->inlineLabel(false);

            if ($itemData instanceof Model) {
                $container->record($itemData);
            }

            $containers[$itemKey] = $container;
        }

        return $containers;
    }
}
