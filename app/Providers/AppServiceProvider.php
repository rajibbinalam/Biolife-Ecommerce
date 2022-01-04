<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use App\Models\SocialLink;
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
        View::share('socials', $socials);


        //  Shopping Cart 
        $carts = Cart::content();
        View::share('carts', $carts);
        $subTotal = Cart::subtotal();
        View::share('subTotal', $subTotal);
        $count = Cart::count();
        View::share('count', $count);
        $tex = Cart::tax();
        View::share('tex', $tex);

        
    }
}
