<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //  Schema::defaultStringLength(191);

        $general = GeneralSetting::first();
        View::share('general', $general);

        //   Front Web Page

        // $general = GeneralSetting::first();
        // View::share('general', $general);
    }
}
