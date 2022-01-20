<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Category;
use App\Models\SocialLink;
use App\Models\GeneralSetting;
use App\Models\Loader;
use App\Models\UseFullLink1st;
use App\Models\UseFullLink2nd;
use App\Models\WebMaintenence;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use PhpOffice\PhpSpreadsheet\Calculation\Web;

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

        $WebMaintenence = WebMaintenence::first();
        $general = GeneralSetting::first();
        $loader = Loader::first();
        $contact = Contact::first();
        $footer1 = UseFullLink1st::first();
        $footer2 = UseFullLink2nd::first();
        View::share(['contact'=> $contact, 'footer1'=>$footer1, 'footer2'=>$footer2,'general'=> $general, 'loader'=>$loader,'WebMaintenence'=>$WebMaintenence]);

        $socials = SocialLink::all();

        view()->composer('partials.header',function($view){
            $view->with([
                'categories' => Category::select('id','name')->with('subCategories:id,name,category_id')->get()
            ]);
        });
       View::share(['socials' => $socials]);


    }
}
