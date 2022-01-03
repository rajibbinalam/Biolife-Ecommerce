<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(Auth::guard('admin'));
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminProfile()
    {
        $pageTitle = "Admin Profile";
        return view('admin.admin-profile',compact('pageTitle'));
    }


    public function adminProfileupdate(Request $requ, $id){
        $edits = Admin::find($id);
        $edits->name = $requ->get('name');
        $edits->phone = $requ->get('phone');
        $edits->email = $requ->get('email');
        $edits->save();

        return back()->with('success','Profile Updated');
    }

}
