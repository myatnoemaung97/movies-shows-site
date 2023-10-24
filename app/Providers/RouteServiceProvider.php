<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Content;
use App\Models\Movie;
use App\Models\Show;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        parent::boot();

        Route::bind('article', function ($value) {
            return Article::where('id', $value)->firstOrFail();
        });

        Route::bind('content', function ($value) {
            return Content::where('id', $value)->firstOrFail();
        });

        Route::bind('movie', function ($value) {
            return Movie::where('slug', $value)->firstOrFail();
        });

        Route::bind('show', function ($value) {
            return Show::where('slug', $value)->firstOrFail();
        });

        Route::bind('season', function ($value, $route) {
            return $route->show->seasons()->where('season_number', $value)->firstOrFail();
        });

        Route::bind('episode', function ($value, $route) {
            return $route->season->episodes()->where('episode_number', $value)->firstOrFail();
        });
    }

}
