@php
    $arrayState = \Illuminate\Support\Arr::wrap($getState());
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flow-root">
        <ul role="list" class="-mb-8 space-y-2">
            @forelse($arrayState as $state)
                <x-filament-timeline::marker :marker="$getMarker($state)" :last="$loop->last" />
            @empty
            @endforelse
        </ul>
    </div>
</x-dynamic-component>