<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\WebMaintenence;
use Illuminate\Http\Request;

class webContentController extends Controller
{
    

    // =============   Home Page Insertion
    public function homePagesinsert(Request $request){
        $request->validate([
            'Feature'=> 'required|max:1024',
        ]);
        $allHome = HomePage::all();
        if(($allHome->count())<1){

            if ($request->hasFile('Feature')) {
                $files = $request->file('Feature');
                
                $imageLocation = array();
                $i = 0;
                foreach ($files as $file){
                    $extension = $file->getClientOriginalExtension();
                    $fileName = 'feature' . time() . ++$i . '.' . $extension;
                    $location = '/Feature/logo/';
                    $file->move(public_path() . $location, $fileName);
                    $imageLocation[] = $location . $fileName;
                }
                HomePage::insert([
                    'Feature' => implode('|',$imageLocation),
                ]);


                return back()->with('success', 'Success!');
            }

        } else {
                return back()->with('error', 'Item Is already Inserted!');
            }

       
     }

    public function homePages(){
        $pageTitle = "Home Page";
        $features = HomePage::first();
        $page_no = $features->web_page;
        //$feature = explode('|',$features->Feature);
        return view('admin.Home_Pages.index', compact('features','pageTitle','page_no'));
    }


    public function HomePage1(Request $request){
        $home1 = HomePage::first();
        $home1->web_page = $request->get('web_page');
        $home1->add_by = $request->get('add_by');
        $home1->save();
        return back()->with('success','Homa Page 1 Selected');
    }
    public function HomePage2(Request $request){
        $home2 = HomePage::first();
        $home2->web_page = $request->get('web_page');
        $home2->add_by = $request->get('add_by');
        $home2->save();
        return back()->with('success','Homa Page 2 Selected');
    }
    public function HomePage3(Request $request){
        //dd($request->all());
        $home3 = HomePage::first();
        $home3->web_page = $request->get('web_page');
        $home3->add_by = $request->get('add_by');
        $home3->save();
        return back()->with('success','Homa Page 3 Selected');
    }
    public function HomePage4(Request $request){
        $home4 = HomePage::first();
        $home4->web_page = $request->get('web_page');
        $home4->add_by = $request->get('add_by');
        $home4->save();
        return back()->with('success','Homa Page 4 Selected');
    }
    public function HomePage5(Request $request){
        $home5 = HomePage::first();
        $home5->web_page = $request->get('web_page');
        $home5->add_by = $request->get('add_by');
        $home5->save();
        return back()->with('success','Homa Page 5 Selected');
    }

    // public function delete(){
    //     $delete = HomePage::all();
    //     $delete->delete();
    //     unlink(public_path($delete->Feature));
    //     return back();
    // }




    //=================== Web Maintence
    public function webMaintence(){
        $pageTitle = "Web Site Maintence";
        $maintenence = WebMaintenence::first();
        return view('admin.Home_Pages.web-maintenece',compact('pageTitle','maintenence'));
    }
    public function webMaintenceInsert(Request $request){
        $maintenence = WebMaintenence::first();
        $maintenence->code = $request->code;
        $maintenence->add_by = $request->add_by;
        $maintenence->save();
        return back()->with('success','Maintenece Updated');
    }

    public function webMaintenceStatusUpdate(Request $request){
        $status = WebMaintenence::first();
        $status->status = $request->status;
        $status->save();
        return back()->with('success','Status Updated Success');
    }

}
