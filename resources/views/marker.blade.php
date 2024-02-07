@php
    $contained = $marker->isContained();
@endphp

<div class="relative pb-8">
    <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-200 dark:bg-white/20 group-last:hidden" aria-hidden="true"></span>

    <div class="relative flex items-start space-x-3">
        <div>
            @php
                $color = $marker->getColor();

                $avatar = $marker->getAvatar();
                $avatarSize = $marker->getAvatarSize();

                $icon = $marker->getIcon();
                $iconSize = $marker->getIconSize();
            @endphp

            @if ($avatar)
                <x-filament-timeline::marker.avatar
                    :avatar="$avatar"
                    :avatar-size="$avatarSize"
                    :icon="$icon"
                    :icon-color="$color"
                />
            @endif

            @if ($icon && ! $avatar)
                <x-filament-timeline::marker.icon
                    :icon="$icon"
                    :icon-color="$color"
                    :icon-size="$iconSize"
                />
            @endif

            @if(! $icon && ! $avatar)
                <x-filament-timeline::marker.default
                    :color="$color"
                />
            @endif
        </div>

        <div
            @class([
                'flex-1 min-w-0',
                'rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 px-6 py-4' => $contained,
            ]) 
        >
            <div>
                <div class="flex items-center justify-between gap-x-3">

                    @if($label = $marker->getLabel())
                        <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                            {{ $label }}
                        </span>
                    @endif
                    
                    @php
                        $hint = $marker->getHint();
                        $hintColor = $marker->getHintColor();
                        $hintIcon = $marker->getHintIcon();
                        $hintIconTooltip = $marker->getHintIconTooltip();
                        
                        $hintActions = array_filter(
                            $marker->getHintActions() ?? [],
                            fn (\Filament\Infolists\Components\Actions\Action $hintAction): bool => $hintAction->isVisible(),
                        );
                    @endphp
                        
                    @if (filled($hint) || $hintIcon || count($hintActions))
                        <x-filament-infolists::entry-wrapper.hint
                            :actions="$hintActions"
                            :color="$hintColor"
                            :icon="$hintIcon"
                            :tooltip="$hintIconTooltip"
                        >
                            {{ $hint }}
                        </x-filament-infolists::entry-wrapper.hint>
                    @endif
                </div>

                @if ($helperText = $marker->getHelperText())
                    <div class="text-sm text-gray-500">
                        {{ $helperText }}
                    </div>
                @endif
            </div>

            <div class="py-2">
                @if($description = $marker->getDescription())
                    <p class="mt-1 text-sm leading-6 text-gray-500 dark:text-gray-400">
                        {{ $description }}
                    </p>
                @endif
                
                @if($content = $marker->getContent())
                    <div class="mt-2">
                        {{ $content }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>