@props([
    'marker',
    'last' => false
])

<li>
    <div class="relative pb-8">
        @unless ($last)
            <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-200 dark:bg-white/20" aria-hidden="true"></span>
        @endunless

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

            <div class="flex-1 min-w-0">
                <div>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span class="font-medium text-gray-900">{{ $marker->getLabel() }}</span>
                        <span class="whitespace-nowrap">{{ $marker->getHint() }}</span>
                    </div>
                    <p class="mt-0.5 text-sm text-gray-500">
                        {{ $marker->getHelperText() }}
                    </p>
                </div>
                <div class="mt-2 text-sm text-gray-700">
                    <p>
                        {{ $marker->getDescription() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</li>
