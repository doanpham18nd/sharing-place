<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Eloquent\Vendor\VendorRepositoryInterface::class,
            \App\Repositories\Eloquent\Vendor\VendorRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Demand\DemandRepositoryInterface::class,
            \App\Repositories\Eloquent\Demand\DemandRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\DemandDetail\DemandDetailRepositoryInterface::class,
            \App\Repositories\Eloquent\DemandDetail\DemandDetailRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Agreement\AgreementRepositoryInterface::class,
            \App\Repositories\Eloquent\Agreement\AgreementRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Region\RegionRepositoryInterface::class,
            \App\Repositories\Eloquent\Region\RegionRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Job\JobRepositoryInterface::class,
            \App\Repositories\Eloquent\Job\JobRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Bill\BillRepositoryInterface::class,
            \App\Repositories\Eloquent\Bill\BillRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Province\ProvinceRepositoryInterface::class,
            \App\Repositories\Eloquent\Province\ProvinceRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Prefecture\PrefectureRepositoryInterface::class,
            \App\Repositories\Eloquent\Prefecture\PrefectureRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\Client\ClientRepositoryInterface::class,
            \App\Repositories\Eloquent\Client\ClientRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\District\DistrictRepositoryInterface::class,
            \App\Repositories\Eloquent\District\DistrictRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\VendorDetail\VendorDetailRepositoryInterface::class,
            \App\Repositories\Eloquent\VendorDetail\VendorDetailRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Eloquent\BillDetail\BillDetailRepositoryInterface::class,
            \App\Repositories\Eloquent\BillDetail\BillDetailRepository::class
        );
    }
}
