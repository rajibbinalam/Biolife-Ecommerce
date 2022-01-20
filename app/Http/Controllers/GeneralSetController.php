<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favicon;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\TopBanner;
use App\Models\MiddleBanner;
use App\Models\BottomBanner;
use App\Models\Loader;
use App\Models\Partner;
use App\Models\PickupLocation;
use App\Models\ReturnPolicy;
use App\Models\ShippingMethod;
use App\Models\ThemeColor;
use PhpParser\Node\Stmt\Return_;

class GeneralSetController extends Controller
{
    //============slider

    public function slidercreate()
    {
        $pageTitle = "Slider";
        $sliders = Slider::orderBy('id', 'DESC')->get();
        return view('admin.slider', compact('sliders', 'pageTitle'));
        //return view('admin.slider');
    }

    public function sliderinsert(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'logo' . time() . '.' . $extension;
            $location = '/images/slider/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            Slider::insert([
                'name' => $request->input('name'),
                'first_tag_line' => $request->input('first_tag_line'),
                'second_tag_line' => $request->input('second_tag_line'),
                'add_by' => $request->input('add_by'),
                'image' => $imageLocation,
            ]);


            return back()->with('success', 'Slider Added Success!');
        } else {
            return back()->with('error', 'Somethink Wrong!');
        }
    }

    public function sliderDelete($id)
    {
        $delete = Slider::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success', 'Slider Deleted!');
    }




    //============= top banners

    public function topbannercreate()
    {
        $pageTitle = "Top Banner";
        $banners = TopBanner::orderBy('id', 'DESC')->get();
        return view('admin.top-banner', compact('banners', 'pageTitle'));
    }

    public function topbannerInsert(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'banner' . time() . '.' . $extension;
            $location = '/images/banner/top/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            TopBanner::insert([
                'name' => $request->input('name'),
                'first_tag_line' => $request->input('first_tag_line'),
                'second_tag_line' => $request->input('second_tag_line'),
                'price' => $request->input('price'),
                'add_by' => $request->input('add_by'),
                'image' => $imageLocation,
            ]);


            return back()->with('success', 'Banner Added Success!');
        } else {
            return back()->with('error', 'Somethink Wrong!');
        }
    }


    public function topbannerEdit($id)
    {
        $pageTitle = "Top Banner Edit";
        $edits = TopBanner::find($id);
        return view('admin.edit-top-banner', compact('edits', 'pageTitle'));
    }


    public function topbannerUpdate(Request $request, $id)
    {
        $tpbanner = TopBanner::find($id);
        $old_image = $tpbanner->image;

        if ($request->hasFile('image')) {
            unlink(public_path($old_image));
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'banner' . time() . '.' . $extension;
            $location = '/images/banner/top/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            $tpbanner->image = $imageLocation;
        } else {

            $tpbanner->image = $old_image;
        }
        $tpbanner->name = $request->input('name');
        $tpbanner->first_tag_line = $request->input('first_tag_line');
        $tpbanner->second_tag_line = $request->input('second_tag_line');
        $tpbanner->price = $request->input('price');
        $tpbanner->add_by = $request->input('add_by');
        $tpbanner->save();
        return redirect('/admin/top-banner')->with('success', 'Top Banner Update Success!');
    }



    public function topbannerDelete($id)
    {
        $delete = TopBanner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success', 'Banner Deleted!');
    }




    //============= Middle banners

    public function middlebannercreate()
    {
        $pageTitle = "Middle Banner";
        $banners = MiddleBanner::orderBy('id', 'DESC')->get();
        return view('admin.middle-banner', compact('banners', 'pageTitle'));
    }

    public function middlebannerInsert(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'banner' . time() . '.' . $extension;
            $location = '/images/banner/middle/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            MiddleBanner::insert([
                'name' => $request->input('name'),
                'first_tag_line' => $request->input('first_tag_line'),
                'second_tag_line' => $request->input('second_tag_line'),
                'price' => $request->input('price'),
                'add_by' => $request->input('add_by'),
                'image' => $imageLocation,
            ]);


            return back()->with('success', 'Banner Added Success!');
        } else {
            return back()->with('error', 'Somethink Wrong!');
        }
    }


    public function middlebannerEdit($id)
    {
        $pageTitle = "Middle Banner Edit";
        $edits = MiddleBanner::find($id);
        return view('admin.edit-middle-banner', compact('edits','pageTitle'));
    }


    public function middlebannerUpdate(Request $request, $id)
    {
        $midbanner = MiddleBanner::find($id);
        $old_image = $midbanner->image;

        if ($request->hasFile('image')) {
            unlink(public_path($old_image));
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'banner' . time() . '.' . $extension;
            $location = '/images/banner/middle/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            $midbanner->image = $imageLocation;
        } else {

            $midbanner->image = $old_image;
        }
        $midbanner->name = $request->input('name');
        $midbanner->first_tag_line = $request->input('first_tag_line');
        $midbanner->second_tag_line = $request->input('second_tag_line');
        $midbanner->price = $request->input('price');
        $midbanner->add_by = $request->input('add_by');
        $midbanner->save();
        return redirect('/admin/middle-banner')->with('success', 'Top Banner Update Success!');
    }



    public function middlebannerDelete($id)
    {
        $delete = MiddleBanner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success', 'Banner Deleted!');
    }



    //============= Bottom banners

    public function bottombannercreate()
    {
        $pageTitle = "Bottom Banner";
        $banners = BottomBanner::orderBy('id','DESC')->get();
        return view('admin.bottom-banner', compact('banners','pageTitle'));
    }

    public function bottombannerInsert(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'banner' . time() . '.' . $extension;
            $location = '/images/banner/bottom/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            BottomBanner::insert([
                'name' => $request->input('name'),
                'first_tag_line' => $request->input('first_tag_line'),
                'second_tag_line' => $request->input('second_tag_line'),
                'price' => $request->input('price'),
                'add_by' => $request->input('add_by'),
                'image' => $imageLocation,
            ]);


            return back()->with('success', 'Banner Added Success!');
        } else {
            return back()->with('error', 'Somethink Wrong!');
        }
    }


    public function bottombannerEdit($id)
    {
        $pageTitle = "Bottom Banner Edit";
        $edits = BottomBanner::find($id);
        return view('admin.edit-bottom-banner', compact('edits','pageTitle'));
    }


    public function bottombannerUpdate(Request $request, $id)
    {
        $midbanner = BottomBanner::find($id);
        $old_image = $midbanner->image;

        if ($request->hasFile('image')) {
            unlink(public_path($old_image));
            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'banner' . time() . '.' . $extension;
            $location = '/images/banner/bottom/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            $midbanner->image = $imageLocation;
        } else {

            $midbanner->image = $old_image;
        }
        $midbanner->name = $request->input('name');
        $midbanner->first_tag_line = $request->input('first_tag_line');
        $midbanner->second_tag_line = $request->input('second_tag_line');
        $midbanner->price = $request->input('price');
        $midbanner->add_by = $request->input('add_by');
        $midbanner->save();
        return redirect('/admin/bottom-banner')->with('success', 'Top Banner Update Success!');
    }



    public function bottombannerDelete($id)
    {
        $delete = BottomBanner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success', 'Banner Deleted!');
    }


    // =============  PickUp Locations
    public function pickupLocation(){
        $pageTitle = "Pickup Location";
        $pickups = PickupLocation::all();
        return view('admin.general_settings.pickup_locations',compact('pickups','pageTitle'));
    }

    public function pickupLocationCreate(Request $request){
        $pickup = new PickupLocation();
        $pickup->name = $request->get('name');
        $pickup->add_by = $request->get('add_by');
        $pickup->save();
        return back()->with('success','Location Created Success');
    }
    public function pickupLocationDelete($id){
        $delete = PickupLocation::find($id);
        $delete->delete();
        return back()->with('success','Location Deleted');
    }

    //=============  Shipping Methods
    
    public function shippingMethod(){
        $pageTitle = "Shipping Method";
        $shippings = ShippingMethod::all();
        return view('admin.general_settings.shipping_method',compact('pageTitle','shippings'));
    }
    public function shippingMethodInsert(Request $request)
    {
        $shipping = new ShippingMethod();
        $shipping->title = $request->title;
        $shipping->duration = $request->duration;
        $shipping->price = $request->price;
        $shipping->add_by = $request->add_by;
        $shipping->save();
        return back()->with('success','Shipping Mehtod Create Success');
    }

    public function shippingMethodDelete($id){
        $delete = ShippingMethod::find($id);
        $delete->delete();
        return back()->with('success','Shipping Method Deleted');
    }



    // ============= Return Policy
    public function returnPolicy(){
        $return_policies = ReturnPolicy::first();
        $pageTitle = "Product Return Policy";
        return view('admin.general_settings.return_policy',compact('pageTitle','return_policies'));
    }
    public function returnPolicyInsert(Request $request){
        $return_policy = new ReturnPolicy();
        $return_policy->descriptions = $request->descriptions;
        $return_policy->add_by = $request->add_by;
        $return_policy->save();
        return back()->with('success','Return Policy Added Success');
    }

    public function returnPolicyEdit($id){
        $edit = ReturnPolicy::find($id);
        $pageTitle = "Product Return Policy Edit";
        return view('admin.general_settings.return_policy_edit',compact('edit','pageTitle'));
    }

    public function returnPolicyUpdate(Request $request, $id){
        $returnPolicy_update =  ReturnPolicy::find($id);
        $returnPolicy_update->descriptions = $request->descriptions;
        $returnPolicy_update->add_by = $request->add_by;
        $returnPolicy_update->save();
        return back()->with('success','Return Policy Update Success');
    }

    public function returnPolicyDelete($id){
        $delete = ReturnPolicy::find($id);
        $delete->delete();
        return back()->with('success','Return Policy Deleted');
    }


    //=========== Theme Color
    public function themeColor(){
        $pageTitle = "Theme Colors";
        return view('admin.general_settings.ThemeColor',compact('pageTitle'));
    }
    public function adminColorUpdate(Request $request){
        $count = ThemeColor::all()->count();
        if($count<1){
            $Admincolor = new ThemeColor();
            $Admincolor->admin = $request->admin_color;
            $Admincolor->add_by = $request->add_by;
            $Admincolor->save();
        }
        $Admincolor = ThemeColor::first();
        $Admincolor->admin = $request->admin_color;
        $Admincolor->add_by = $request->add_by;
        $Admincolor->save();
        return back()->with('success','Admin Theme Color Changed');
    }

    
    public function adminSidebarUpdate(Request $request){
        $count = ThemeColor::all()->count();
        if($count<1){
            $Admincolor = new ThemeColor();
            $Admincolor->adminSideBar = $request->adminSideBar;
            $Admincolor->add_by = $request->add_by;
            $Admincolor->save();
        }
        $Admincolor = ThemeColor::first();
        $Admincolor->adminSideBar = $request->adminSideBar;
        $Admincolor->add_by = $request->add_by;
        $Admincolor->save();
        return back()->with('success','Admin Theme Color Changed');
    }


    public function webColorUpdate(Request $request){
        $count = ThemeColor::all()->count();
        if($count<1){
            $Admincolor = new ThemeColor();
            $Admincolor->WebPage = $request->web_color;
            $Admincolor->add_by = $request->add_by;
            $Admincolor->save();
        }
        $Admincolor = ThemeColor::first();
        $Admincolor->WebPage = $request->web_color;
        $Admincolor->add_by = $request->add_by;
        $Admincolor->save();
        return back()->with('success','Web Theme Color Changed');
    }

    //=============== Loader
    public function loader(){
        $pageTitle = "Loader";
        $loader = Loader::first();
        return view('admin.general_settings.loader',compact('pageTitle','loader'));
    }

    public function loaderInsert(Request $request){
        $loader = Loader::first();
        $loader->html = $request->html;
        $loader->add_by = $request->add_by;
        $loader->save();
        return back()->with('success','Loadder Added Success');

    }

    public function loaderstatusUpdate(Request $request){
        $status = Loader::first();
        $status->status = $request->status;
        $status->save();
        return back()->with('success','Status Updated Success');
    }
    //============= Partners

    public function partnercreate()
    {
        $pageTitle = "Partners";
        $partners = Partner::orderBy('id','DESC')->get();
        return view('admin.partners', compact('partners','pageTitle'));
    }

    public function partnerInsert(Request $request)
    {

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'partner' . time() . '.' . $extension;
            $location = '/images/partners/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            Partner::insert([
                'links' => $request->input('links'),
                'add_by' => $request->input('add_by'),
                'logo' => $imageLocation,
            ]);


            return back()->with('success', 'Partner Added Success!');
        } else {
            return back()->with('error', 'Somethink Wrong!');
        }
    }


    public function partnerEdit($id)
    {
        $pageTitle = "Partners Edit";
        $edits = Partner::find($id);
        return view('admin.partner-edit', compact('edits','pageTitle'));
    }


    public function partnerUpdate(Request $request, $id)
    {
        $partner = Partner::find($id);
        $old_image = $partner->logo;

        if ($request->hasFile('logo')) {
            unlink(public_path($old_image));
            $file = $request->file('logo');

            $extension = $file->getClientOriginalExtension();
            $fileName = 'partner' . time() . '.' . $extension;
            $location = '/images/partners/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location . $fileName;

            $partner->logo = $imageLocation;
        } else {

            $partner->logo = $old_image;
        }
        $partner->links = $request->input('links');
        $partner->add_by = $request->input('add_by');
        $partner->save();
        return redirect('/admin/partner')->with('success', 'Partner Update Success!');
    }



    public function partnerDelete($id)
    {
        $delete = Partner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->logo));
        return back()->with('success', 'Partner Deleted!');
    }
}
