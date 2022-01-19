<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UseFullLink1st;
use App\Models\UseFullLink2nd;

class ManuPageController extends Controller
{
    public function footerManu(){
        $footer1 = UseFullLink1st::first();
        $footer2 = UseFullLink2nd::first();
        $pageTitle = "Footer Manu";
        return view('admin.manu_page_settings.footer_manu',compact('pageTitle','footer1','footer2'));
    }

    public function footerManuAdd1st(Request $request){
        $count = UseFullLink1st::all()->count();
        if($count<1){
            $footer1 = new UseFullLink1st();
        }else{
            $footer1 = UseFullLink1st::first();
        }
        $footer1->name1= $request->name1;
        $footer1->link1= $request->link1;
        $footer1->name2= $request->name2;
        $footer1->link2= $request->link2;
        $footer1->name3= $request->name3;
        $footer1->link3= $request->link3;
        $footer1->name4= $request->name4;
        $footer1->link4= $request->link4;
        $footer1->name5= $request->name5;
        $footer1->link5= $request->link5;
        $footer1->name6= $request->name6;
        $footer1->link6= $request->link6;
        $footer1->add_by= $request->add_by;
        $footer1->save();
        return back()->with('success','Footer Link Addedd Success');
        
    }
    public function footerManuAdd2nd(Request $request){
        $count = UseFullLink2nd::all()->count();
        if($count<1){
            $footer2 = new UseFullLink2nd();
        }else{
            $footer2 = UseFullLink2nd::first();
        }
        $footer2->name1= $request->name1;
        $footer2->link1= $request->link1;
        $footer2->name2= $request->name2;
        $footer2->link2= $request->link2;
        $footer2->name3= $request->name3;
        $footer2->link3= $request->link3;
        $footer2->name4= $request->name4;
        $footer2->link4= $request->link4;
        $footer2->name5= $request->name5;
        $footer2->link5= $request->link5;
        $footer2->name6= $request->name6;
        $footer2->link6= $request->link6;
        $footer2->add_by= $request->add_by;
        $footer2->save();
        return back()->with('success','Footer Link Addedd Success');
        
    }



}
