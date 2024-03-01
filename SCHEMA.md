```php
TimelineEntry::make('messages')
    ->schema([
        TimelineEntry\Marker::make('user.avatar')
            ->avatar(),

        TimelineEntry\Section::make()
            ->heading(fn ($record) => $record->sender->name)
            ->description(fn ($record) => $record->type->getDescription())
            ->hint(fn ($record) => $record->created_at)
            ->hintActions([
                //
            ])
            ->schema([
                TimelineEntry\TextContent::make('content'),
                
                TimelineEntry\RepeatableContent::make('attachments')
                    ->schema([
                        TimelineEntry\TextContent::make(),

                        ...array_map(
                            fn (Attachment $record) => match($record->type) {
                                'image' => TimelineEntry\MediaEntry::make('attachments')
                                    ->image($record->url),
                                'video' => TimelineEntry\MediaEntry::make('attachments')
                                    ->video($record->url),
                                default => TimelineEntry\MediaEntry::make('attachments')
                                    ->text($record->url),
                            },
                            $record->attachments
                        ),
                    ]),
            ]),
    ]);
```