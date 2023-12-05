<?php

namespace Saade\FilamentTimeline;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentTimelineServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-timeline';

    public static string $viewNamespace = 'filament-timeline';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations()
            ->hasViews(static::$viewNamespace);
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'saade/filament-timeline';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-timeline', __DIR__ . '/../resources/dist/components/filament-timeline.js'),
            Css::make('filament-timeline-styles', __DIR__ . '/../resources/dist/filament-timeline.css'),
            Js::make('filament-timeline-scripts', __DIR__ . '/../resources/dist/filament-timeline.js'),
        ];
    }
}
