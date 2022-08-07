<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /****************************************   Admin  **************************************************************/
        $this->app->bind('App\Http\Repository\Admin\CategoryRepositoryInterface','App\Http\Repository\Admin\CategoryRepository');
        $this->app->bind('App\Http\Repository\Admin\SubCategoryRepositoryInterface','App\Http\Repository\Admin\subCategoryRepository');
        $this->app->bind('App\Http\Repository\Admin\ProductRepositoryInterface','App\Http\Repository\Admin\ProductRepository');
        $this->app->bind('App\Http\Repository\Admin\FilterRepositoryInterface','App\Http\Repository\Admin\FilterRepository');
        $this->app->bind('App\Http\Repository\Admin\SubFilterRepositoryInterface','App\Http\Repository\Admin\SubFilterRepository');

        /****************************************   Customer  **************************************************************/
        $this->app->bind('App\Http\Repository\Customer\HomeRepositoryInterface','App\Http\Repository\Customer\HomeRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
