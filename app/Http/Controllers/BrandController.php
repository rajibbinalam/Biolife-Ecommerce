<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

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

}
