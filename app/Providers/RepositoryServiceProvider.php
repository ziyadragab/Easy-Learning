<?php

namespace App\Providers;

use App\Http\Interfaces\Admin\AboutInterface;
use App\Http\Interfaces\Admin\AuthInterface as AdminAuthInterface;
use App\Http\Interfaces\Admin\HomeInterface;
use App\Http\Interfaces\Admin\HomeSlideInterface;
use App\Http\Interfaces\Admin\ImageInterface;
use App\Http\Interfaces\EndUser\AuthInterface;
use App\Http\Interfaces\EndUser\HomeInterface as EndUserHomeInterface;
use App\Http\Interfaces\EndUser\RegisterInterface;
use App\Http\Repositories\Admin\AboutRepository;
use App\Http\Repositories\Admin\AuthRepository as AdminAuthRepository;
use App\Http\Repositories\Admin\HomeRepository;
use App\Http\Repositories\Admin\HomeSlideRepository;
use App\Http\Repositories\Admin\ImageRepository;
use App\Http\Repositories\EndUser\AuthRepository;
use App\Http\Repositories\EndUser\HomeRepository as EndUserHomeRepository;
use App\Http\Repositories\EndUser\RegisterRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        /**
         * Start  Admin Classes-----------------------------
         */
        $this->app->bind(
          HomeInterface::class,
          HomeRepository::class,
        );
        $this->app->bind(
            AdminAuthInterface::class,
            AdminAuthRepository::class,
          );
          $this->app->bind(
            HomeSlideInterface::class,
            HomeSlideRepository::class,
          );
          $this->app->bind(
            AboutInterface::class,
            AboutRepository::class,
          );
          $this->app->bind(
            ImageInterface::class,
            ImageRepository::class,
          );

        /**
         * End  Admin Classes-------------------------------
         */

         /**
          * Start EndUser Classes

          */

         $this->app->bind(
           EndUserHomeInterface::class,
           EndUserHomeRepository::class
         );
         $this->app->bind(
            RegisterInterface::class,
            RegisterRepository::class
          );
          $this->app->bind(
            AuthInterface::class,
            AuthRepository::class
          );

            /**
          * End EndUser Classes
          *
          */
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
