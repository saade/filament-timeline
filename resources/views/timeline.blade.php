@php
    $arrayState = \Illuminate\Support\Arr::wrap($getState());
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flow-root">
         @if (count($childComponentContainers = $getChildComponentContainers()))
            <ul role="list" class="-mb-8 space-y-2">
                @forelse($childComponentContainers as $container)
                    <li class="group">
                        {{ $container }}
                    </li>
                @empty
                @endforelse
            </ul>
        @endif
    </div>
</x-dynamic-component>