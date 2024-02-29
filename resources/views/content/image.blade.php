<div>
    <div class="text-sm leading-6 text-gray-500 dark:text-gray-400">
        {!! $content->getText() !!}
    </div>

    <ul role="list" class="grid grid-cols-2 mt-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach($content->getImages() as $image)
            @capture($object)
                <img
                    src="{{ $image->getSrc() }}"
                    @if($alt = $image->getAlt())
                        alt="{{ $alt }}"
                    @endif
                    class="object-cover pointer-events-none"
                />
            @endcapture
            
            <li class="relative">
                <div class="block w-full overflow-hidden bg-gray-100 rounded-lg aspect-1">
                    @if($hasLightbox())
                        <a href="{{ $image->getSrc() }}" target="_blank" class="glightbox" data-gallery="{{ $getGallery() }}">
                            {{ $object() }}
                        </a>
                    @else
                        {{ $object() }}
                    @endif
                </div>
                
                <div class="flex justify-between mt-2">
                    <div>
                        @if($name = $image->getName())
                            <p class="block text-sm font-medium text-gray-900">{{ $name }}</p>
                        @endif

                        @if($size = $image->getSize())
                            <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{ $size }}</p>
                        @endif
                    </div>

                    @if($image->isDownloadable())
                        <div class="mx-1">
                            <x-filament::icon-button
                                tag="a"
                                icon="heroicon-o-arrow-down-tray"
                                href="{{ $image->getSrc() }}"
                                target="_blank"
                                download
                            />
                        </div>
                    @endif
                </div>

                @if($caption = $image->getCaption())
                    <p class="block mt-2 text-xs text-gray-500">{{ $caption }}</p>
                @endif
            </li>
        @endforeach
    </ul>
</div>
