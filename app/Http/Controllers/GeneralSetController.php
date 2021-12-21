<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favicon;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\TopBanner;
use App\Models\MiddleBanner;
use App\Models\BottomBanner;

class GeneralSetController extends Controller
{
    //


//======favicon
    public function faviconcreate(){
        $icon = Favicon::all();
        return view('admin.favicon', compact('icon'));
    }

    public function faviconInsert(Request $request){
        
        $iconid = Favicon::find(1);

     
     if($request->hasFile('icon')){
        unlink(public_path($iconid->icon));
        $file = $request->file('icon');

            $extension = $file->getClientOriginalExtension();
            $fileName= 'favicon'. time() . '.' . $extension;
            $location= '/images/favicon/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation= $location. $fileName;
        
            $iconid->icon = $imageLocation;
            $iconid->save();
        
        
        return back();
     }  else{
            return back()->with('error', 'Somethink Wrong!');
        }


    }




//=========logo
    public function logocreate(){
        $logoo = Logo::all();
        return view('admin.logo', compact('logoo'));
    }



    public function logoInsert(Request $request){

     if($request->hasFile('image')){
        $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $fileName= 'logo'. time() . '.' . $extension;
            $location= '/images/logo/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation= $location. $fileName;
        
            Logo::insert([
                'name'=> $request->input('name'),
                'status'=> $request->get('status'),
                'image'=> $imageLocation,
            ]);
        
        
        return back();
     }  else{
            return back()->with('error', 'Somethink Wrong!');
        }


    }

    public function logoDelete($id){
        $delete = Logo::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success','Logo Deleted!');
    }


//============slider

    public function slidercreate(){
        $sliders = Slider::all();
        return view('admin.slider', compact('sliders'));
        //return view('admin.slider');
    }

    public function sliderinsert(Request $request){

         if($request->hasFile('image')){
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'logo'. time() . '.' . $extension;
                $location= '/images/slider/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
            
                Slider::insert([
                    'name'=> $request->input('name'),
                    'first_tag_line'=> $request->input('first_tag_line'),
                    'second_tag_line'=> $request->input('second_tag_line'),
                    'image'=> $imageLocation,
                ]);
            
            
            return back()->with('success', 'Slider Added Success!');
         }  else{
                return back()->with('error', 'Somethink Wrong!');
            }


        }

        public function sliderDelete($id){
        $delete = Slider::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success','Logo Deleted!');
    }




//============= top banners

public function topbannercreate(){
        $banners = TopBanner::all();
        return view('admin.top-banner', compact('banners'));
        
    }

    public function topbannerInsert(Request $request){

         if($request->hasFile('image')){
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'banner'. time() . '.' . $extension;
                $location= '/images/banner/top/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
            
                TopBanner::insert([
                    'name'=> $request->input('name'),
                    'first_tag_line'=> $request->input('first_tag_line'),
                    'second_tag_line'=> $request->input('second_tag_line'),
                    'price'=> $request->input('price'),
                    'image'=> $imageLocation,
                ]);
            
            
            return back()->with('success', 'Banner Added Success!');
         }  else{
                return back()->with('error', 'Somethink Wrong!');
            }


        }


        public function topbannerEdit($id){
        $edits = TopBanner::find($id);
        return view('admin.edit-top-banner', compact('edits'));
        
            }


        public function topbannerUpdate(Request $request, $id){
            $tpbanner = TopBanner::find($id);
            $old_image = $tpbanner->image;

         if($request->hasFile('image')){
            unlink(public_path($old_image));
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'banner'. time() . '.' . $extension;
                $location= '/images/banner/top/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
        
                $tpbanner->image = $imageLocation;
            
         }  else{

                $tpbanner->image = $old_image;
            }
            $tpbanner->name = $request->input('name');
            $tpbanner->first_tag_line = $request->input('first_tag_line');
            $tpbanner->second_tag_line = $request->input('second_tag_line');
            $tpbanner->price = $request->input('price');
            $tpbanner->save();
            return redirect('/admin/top-banner')->with('success', 'Top Banner Update Success!');
        }



        public function topbannerDelete($id){
        $delete = TopBanner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success','Banner Deleted!');
    }



















}
