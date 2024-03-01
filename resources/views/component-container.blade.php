@php
    use Filament\Infolists\Components\Component;
    use Saade\FilamentTimeline\Components\TimelineEntry\Marker;

    $marker = $getComponent(fn (Component $component) => $component instanceof Marker);
    $components = array_filter($getComponents(), fn (Component $component) => ! $component instanceof Marker);
@endphp

<div class="relative pb-8">
    <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-200 dark:bg-white/20 group-last:hidden" aria-hidden="true"></span>

    <div class="relative flex items-start space-x-4">
        {{ $marker }}
        
        <div class="flex-1 min-w-0">    
            @foreach ($components as $component)
                {{ $component }}
            @endforeach
        </div>
    </div>
</div>