<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        $pageTitle = "All Products";
        return view('admin.product.all-products', compact('products','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New Product";
        $categories = Category::all();
        return view('admin.product.add-product',compact('categories','pageTitle'));
    }

    public function SubCategories(Request $request)
    {
        $subcategories = SubCategory::where('categories_id', $request->categories_id)->get(['name', 'id']);
        return response()->json($subcategories);
    }

    public function categoryWiseSubCatgoery($id){

        $subCategories=SubCategory::where('category_id',$id)->get();
        return response()->json([
            'success' => true,
            'subCategories' => $subCategories
        ]);
        
    }

    public function chilCategories(Request $request)
    {
        $childcategories = ChildCategory::where('sub_categories_id', $request->sub_categories_id)->get(['name', 'id']);
        return response()->json($childcategories);
    }

    public function categoryWiseChildCatgoery($id){
        $childCategories=ChildCategory::where('sub_category_id',$id)->get();
        return response()->json([
            'success' => true,
            'childCategories' => $childCategories
        ]);
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productAdd(Request $request){
        
        $request->validate([
            'name'=> 'required',
            'sku'=> 'required',
            'new_price'=> 'required',
            'old_price'=> 'required',
            'quantity'=> 'required',
            'size'=> 'string',
            //'add_by '=> 'required',
            'image'=> 'required',
            'details'=> 'required',
            'category_id '=> 'string',
            'sub_category_id '=> 'string',
            'child_category_id '=> 'string',
        ]);

        if($request->hasFile('image')){
            $files = $request->file('image');

            $imageLocation= array();
            $i=0;
            foreach ($files as $file){
                $extension = $file->getClientOriginalExtension();
                $fileName= 'product_'. time() . ++$i . '.' . $extension;
                $location= '/images/products/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation[]= $location. $fileName;
            }

            $product = new Product();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->new_price = $request->new_price;
            $product->old_price = $request->old_price;
            $product->quantity = $request->quantity;
            $product->details = $request->details;
            $product->size = $request->size;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->child_category_id = $request->child_category_id;
            $product->add_by = $request->add_by;
            $product->image = implode('|', $imageLocation);
            $product->save();

            return back()->with('success', 'Product Successfully Saved!');

        }else{
             return back()->with('error', 'Product Not Saved!');
        }
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
