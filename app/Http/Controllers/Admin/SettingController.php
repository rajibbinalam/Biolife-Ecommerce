<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class SettingController extends Controller
{
    public function general()
    {
        $pageTitle = "General Setting";
        return view('admin.setting.general', compact('pageTitle'));
    }


    public function updateGeneralSetting(Request $request)
    {
        $request->validate([
            'sitename' => "string",
            'address' => "string",
            'logo' => "mimes:jpeg,jpg,png,gif",
            'favicon' => "mimes:jpeg,jpg,png,gif",
        ]);
        $general = GeneralSetting::first();
        $general->site_name = $request->sitename;
        $general->address = $request->address;
        $general->add_by = $request->add_by;
        $old_logo = $general->logo;
        $old_favicon = $general->favicon;

        if ($request->hasFile('logo')) {
            unlink(public_path($old_logo));

            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'logo_' . time() . '.' . $extension;
            $location = '/images/logo_favicon/';
            $file->move(public_path() . $location, $fileName);
            $general->logo = $location . $fileName;
        }
        if ($request->hasFile('favicon')) {
            unlink(public_path($old_favicon));

            $favicon = $request->file('favicon');
            $faviconExtension = $favicon->getClientOriginalExtension();
            $faviconName = 'favicon_' . time() . '.' . $faviconExtension;
            $fLocation = '/images/logo_favicon/';
            $favicon->move(public_path() . $fLocation, $faviconName);
            $general->favicon = $fLocation . $faviconName;
        }

        $general->save();
        return back()->with('success','Settings Update Success');
    }




    //================ Customers
    public function customers(){
        $pageTitle = "Customers";
        $customers = User::all();
        return View('admin.customers.customers',compact('customers','pageTitle'));
    }

    public function customersDelete($id){
        $delete = User::find($id);
        $delete->delete();
        return back()->with('success','Customer Deleted');
    }

}
