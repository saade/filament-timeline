<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
        {{
            $attributes
                ->merge(['id' => $getId()], escape: false)
                ->merge($getExtraAttributes(), escape: false)
                ->class(['fi-timeline'])
        }}
    >
         @if (count($childComponentContainers = $getChildComponentContainers()))
            <ul role="list" class="-mb-8 space-y-2">
                @foreach($childComponentContainers as $container)
                    <li class="block group fi-timeline-item">
                        {{ $container }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-dynamic-component>