<?php

namespace Modules\Icommerceordertotal\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Icommerceordertotal\Events\Handlers\RegisterIcommerceordertotalSidebar;

class IcommerceordertotalServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIcommerceordertotalSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('icommerceordertotals', Arr::dot(trans('icommerceordertotal::icommerceordertotals')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('icommerceordertotal', 'permissions');
        $this->publishConfig('icommerceordertotal', 'config');
        $this->publishConfig('icommerceordertotal', 'crud-fields');

        //$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Icommerceordertotal\Repositories\IcommerceOrdertotalRepository',
            function () {
                $repository = new \Modules\Icommerceordertotal\Repositories\Eloquent\EloquentIcommerceOrdertotalRepository(new \Modules\Icommerceordertotal\Entities\IcommerceOrdertotal());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Icommerceordertotal\Repositories\Cache\CacheIcommerceOrdertotalDecorator($repository);
            }
        );
// add bindings

    }
}
