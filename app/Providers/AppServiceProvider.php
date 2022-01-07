<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Category;
use App\Models\SocialLink;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;

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

        $contact = Contact::first();
        View::share('contact', $contact);

        $socials = SocialLink::all();

        view()->composer('partials.header',function($view){
            $view->with([
                'categories' => Category::select('id','name')->with('subCategories:id,name,category_id')->get()
            ]);
        });
       View::share(['socials' => $socials]);


    }
}
