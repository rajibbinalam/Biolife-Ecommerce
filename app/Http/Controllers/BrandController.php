<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Coupon;

class BrandController extends Controller
{
    public function index(){
        $pageTitle = "Brands";
        $brands = Brand::orderBy('id','DESC')->get();
        return view('admin.brand.brand', compact('brands','pageTitle'));
        
    }

    public function insert(Request $request){
         $request->validate([
            'name' => 'string|max:255|required',
        ]);
        Brand::insert([
            'name'=> $request->input('name'),
            'add_by'=> $request->input('add_by'),
        ]); 
        return back()->with('success', 'Brand Added Success!');
    }


    public function delete($id){
        $delete = Brand::find($id);
        $delete->delete();
        return back()->with('success','Brand Deleted!');
    }
    



    //=====================  Coupons Section

    public function coupons(){
        $pageTitle = "Counpon";
        $coupons = Coupon::all();
        return view('admin.brand.coupon',compact('pageTitle','coupons'));
    }
    public function couponsInsert(Request $request){
        $coupons = new Coupon();
        $coupons->name = $request->name;
        $coupons->persentage = $request->persentage;
        $coupons->add_by = $request->add_by;
        $coupons->save();
        return back()->with('success','Coupon Addedd Success');
    }
    public function couponDelete($id){
        $delete = Coupon::find($id);
        $delete->delete();
        return back()->with('success','Coupon Deleted!');
    }
}
