<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favicon;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\TopBanner;
use App\Models\MiddleBanner;
use App\Models\BottomBanner;
use App\Models\Partner;

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




//============= Middle banners

public function middlebannercreate(){
        $banners = MiddleBanner::all();
        return view('admin.middle-banner', compact('banners'));
        
    }

    public function middlebannerInsert(Request $request){

         if($request->hasFile('image')){
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'banner'. time() . '.' . $extension;
                $location= '/images/banner/middle/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
            
                MiddleBanner::insert([
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


        public function middlebannerEdit($id){
        $edits = MiddleBanner::find($id);
        return view('admin.edit-middle-banner', compact('edits'));
        
            }


        public function middlebannerUpdate(Request $request, $id){
            $midbanner = MiddleBanner::find($id);
            $old_image = $midbanner->image;

         if($request->hasFile('image')){
            unlink(public_path($old_image));
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'banner'. time() . '.' . $extension;
                $location= '/images/banner/middle/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
        
                $midbanner->image = $imageLocation;
            
         }  else{

                $midbanner->image = $old_image;
            }
            $midbanner->name = $request->input('name');
            $midbanner->first_tag_line = $request->input('first_tag_line');
            $midbanner->second_tag_line = $request->input('second_tag_line');
            $midbanner->price = $request->input('price');
            $midbanner->save();
            return redirect('/admin/middle-banner')->with('success', 'Top Banner Update Success!');
        }



        public function middlebannerDelete($id){
        $delete = MiddleBanner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success','Banner Deleted!');
    }



//============= Bottom banners

public function bottombannercreate(){
        $banners = BottomBanner::all();
        return view('admin.bottom-banner', compact('banners'));
        
    }

    public function bottombannerInsert(Request $request){

         if($request->hasFile('image')){
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'banner'. time() . '.' . $extension;
                $location= '/images/banner/bottom/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
            
                BottomBanner::insert([
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


        public function bottombannerEdit($id){
        $edits = BottomBanner::find($id);
        return view('admin.edit-bottom-banner', compact('edits'));
        
            }


        public function bottombannerUpdate(Request $request, $id){
            $midbanner = BottomBanner::find($id);
            $old_image = $midbanner->image;

         if($request->hasFile('image')){
            unlink(public_path($old_image));
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'banner'. time() . '.' . $extension;
                $location= '/images/banner/bottom/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
        
                $midbanner->image = $imageLocation;
            
         }  else{

                $midbanner->image = $old_image;
            }
            $midbanner->name = $request->input('name');
            $midbanner->first_tag_line = $request->input('first_tag_line');
            $midbanner->second_tag_line = $request->input('second_tag_line');
            $midbanner->price = $request->input('price');
            $midbanner->save();
            return redirect('/admin/bottom-banner')->with('success', 'Top Banner Update Success!');
        }



        public function bottombannerDelete($id){
        $delete = BottomBanner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->image));
        return back()->with('success','Banner Deleted!');
    }



//============= Partners

public function partnercreate(){
        $partners = Partner::all();
        return view('admin.partners', compact('partners'));
        
    }

    public function partnerInsert(Request $request){

         if($request->hasFile('logo')){
            $file = $request->file('logo');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'partner'. time() . '.' . $extension;
                $location= '/images/partners/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
            
                Partner::insert([
                    'links'=> $request->input('links'),
                    'logo'=> $imageLocation,
                ]);
            
            
            return back()->with('success', 'Partner Added Success!');
         }  else{
                return back()->with('error', 'Somethink Wrong!');
            }


        }


        public function partnerEdit($id){
        $edits = Partner::find($id);
        return view('admin.partner-edit', compact('edits'));
        
            }


        public function partnerUpdate(Request $request, $id){
            $partner = Partner::find($id);
            $old_image = $partner->logo;

         if($request->hasFile('logo')){
            unlink(public_path($old_image));
            $file = $request->file('logo');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'partner'. time() . '.' . $extension;
                $location= '/images/partners/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
        
                $partner->logo = $imageLocation;
            
         }  else{

                $partner->logo = $old_image;
            }
            $partner->links = $request->input('links');
            $partner->save();
            return redirect('/admin/partner')->with('success', 'Partner Update Success!');
        }



        public function partnerDelete($id){
        $delete = Partner::find($id)->first();
        $delete->delete();
        unlink(public_path($delete->logo));
        return back()->with('success','Partner Deleted!');
    }











}
