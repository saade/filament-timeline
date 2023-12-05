<?php

namespace Saade\FilamentTimeline\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Saade\FilamentTimeline\FilamentTimeline
 */
class FilamentTimeline extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Saade\FilamentTimeline\FilamentTimeline::class;
    }
}
