<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureModels();

        seo()
            ->site('FeelFree — Share Your Thoughts, Find Your Support')
            ->title(
                default: 'FeelFree — Share Your Thoughts, Find Your Support',
                modify: fn (string $title) => $title . ' | FeelFree'
            )
            ->description(default: 'Share worries anonymously and get support from the community.')
            ->image(default: fn () => asset('logo.png'))
            ->favicon()
            ->twitter()
            ->twitterSite('@abrardev99');
    }

    /**
     * Configure the models.
     */
    private function configureModels(): void
    {
        Model::shouldBeStrict(! $this->app->isProduction());
        Model::unguard();
        Relation::enforceMorphMap([
            'post' => 'App\Models\Post',
            'comment' => 'App\Models\Comment',
        ]);
    }
}
