<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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



    // ================== manage Staffs
    public function manageStaffs(){
        $pageTitle = "Manage Staffs";
        $staffs = Admin::all();
        return view('admin.auth.manage_staffs',compact('pageTitle','staffs'));

    }

    public function adminStatusUpdate(Request $request,$id){
        $statusUpdate = Admin::find($id);
        $statusUpdate->roll = $request->roll;
        $statusUpdate->save();
        return back()->with('success','Staff Starus Updated');
    }

    public function adminStaffDelete($id){
        $delete = Admin::find($id);
        $delete->delete();
        return back()->with('success','Staff Deleted Success');

    }

    public function newStaff(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $staff = new Admin();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->roll = $request->roll;
        $staff->password = Hash::make($request->password);
        $staff->save();
        return back()->with('success','Staff Added Success');
    }







}
