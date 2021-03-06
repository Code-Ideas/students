<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\EBook;
use App\Models\User;
use App\Models\ServiceLayerAttachment;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('service_layer_attachment', function ($id) {
            return ServiceLayerAttachment::whereId($id)->firstOrFail();
        });
        Route::bind('staff_member', function ($id) {
            return Admin::where([['id', $id], ['role' , 'staff']])->firstOrFail();
        });
        Route::bind('supervisor', function ($id) {
            return Admin::where([['id', $id], ['role' , 'supervisor']])->firstOrFail();
        });
        Route::bind('book', function ($id) {
            return EBook::where('id', $id)->firstOrFail();
        });
        Route::bind('literacy', function ($id) {
            return User::where('id', $id)->firstOrFail();
        });

        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace.'\API')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/dashboard.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
