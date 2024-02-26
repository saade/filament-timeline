<div>
    <p class="text-sm leading-6 text-gray-500 dark:text-gray-400">
        {{ $content->getText() }}
    </p>

    <ul role="list" class="grid grid-cols-2 mt-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach($content->getVideos() as $video)
            @capture($object)
                <video
                    src="{{ $video->getSrc() }}"
                    class="object-cover h-full"
                    @if($poster = $video->getPoster())
                        poster="{{ $poster }}"
                    @endif
                    @if($video->getControls() && ! $hasLightbox())
                        controls
                    @endif
                ></video>
            @endcapture

            <li class="relative">
                <div class="block w-full overflow-hidden bg-gray-100 rounded-lg aspect-1">
                    @if($hasLightbox())
                        <a href="{{ $video->getSrc() }}" target="_blank" class="glightbox" data-gallery="{{ $getGallery() }}">
                            {{ $object() }}
                        </a>
                    @else
                        {{ $object() }}
                    @endif
                </div>
                
                <div class="flex justify-between mt-2">
                    <div>
                        @if($name = $video->getName())
                            <p class="block text-sm font-medium text-gray-900">{{ $name }}</p>
                        @endif

                        @if($size = $video->getSize())
                            <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{ $size }}</p>
                        @endif
                    </div>

                    @if($video->isDownloadable())
                        <div class="mx-1">
                            <x-filament::icon-button
                                tag="a"
                                icon="heroicon-o-arrow-down-tray"
                                href="{{ $video->getSrc() }}"
                                target="_blank"
                                download
                            />
                        </div>
                    @endif
                </div>

                @if($caption = $video->getCaption())
                    <p class="block mt-2 text-xs text-gray-500">{{ $caption }}</p>
                @endif
            </li>
        @endforeach
    </ul>
</div>