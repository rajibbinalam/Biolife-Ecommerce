<?php

namespace App\Http\Controllers;

use App\Models\BestSeller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Brand;

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
        $brands = Brand::all();
        return view('admin.product.add-product',compact('categories','pageTitle','brands'));
    }
//======================Show Category For Store Products
    public function SubCategories(Request $request)
    {
        $subcategories = SubCategory::where('categories_id', $request->categories_id)->get(['name', 'id']);
        return response()->json($subcategories);
    }

    public function categoryWiseSubCatgoery($id){

        $subCategories=SubCategory::where('category_id',$id)->get();
        return response()->json([
            'success' => true,
            'subCategories' => $subCategories,
        ]);
        
    }
//        =========Child Category

    // public function chilCategories(Request $request)
    // {
    //     $childcategories = ChildCategory::where('sub_categories_id', $request->sub_categories_id)->get(['name', 'id']);
    //     return response()->json($childcategories);
    // }

    // public function categoryWiseChildCatgoery($id){
    //     $childCategories=ChildCategory::where('sub_category_id',$id)->get();
    //     return response()->json([
    //         'success' => true,
    //         'childCategories' => $childCategories
    //     ]);
        
    // }

//============================= Products Store 
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
            //'size'=> 'string',
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
            $product->brand_id = $request->brand_id;
            $product->new_price = $request->new_price;
            $product->old_price = $request->old_price;
            $product->quantity = $request->quantity;
            $product->details = $request->details;
            $product->size = $request->size;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->child_category_id = $request->child_category_id;
            $product->add_by = $request->add_by;
            $product->brand_id = $request->brand_id;
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
    public function editProduct($id)
    {
        $edit = Product::find($id);
        $pageTitle = "All Products";
        $images = explode('|',$edit->image);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit-product', compact('edit','images','categories','pageTitle','brands'));
    }
    public function editSubCategories(Request $request)
    {
        $editsubcategories = SubCategory::where('categories_id', $request->categories_id)->get(['name', 'id']);
        return response()->json($editsubcategories);
    }

    public function editcategoryWiseSubCatgoery($id){

        $editsubCategories=SubCategory::where('category_id',$id)->get();
        return response()->json([
            'success' => true,
            'editsubCategories' => $editsubCategories
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {  
        $update_product = Product::find($id);
        // $request->validate([
        //     'name'=> 'required',
        //     'sku'=> 'required',
        //     'new_price'=> 'required',
        //     'old_price'=> 'required',
        //     'quantity'=> 'required',
        //     //'size'=> 'string',
        //     //'add_by '=> 'required',
        //     'image'=> 'required',
        //     'details'=> 'required',
        //     'category_id '=> 'string',
        //     //'sub_category_id '=> 'string',
        //     //'child_category_id '=> 'string',
        // ]);
        $old_image = $update_product->image;
        if($request->hasFile('image')){
            unlink(public_path($old_image));
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

            $update_product->image = implode('|', $imageLocation);

        }
        else{
            $update_product->image = $old_image;
        }
            $update_product->name = $request->name;
            $update_product->sku = $request->sku;
            $update_product->new_price = $request->new_price;
            $update_product->old_price = $request->old_price;
            $update_product->quantity = $request->quantity;
            $update_product->details = $request->details;
            $update_product->size = $request->size;
            $update_product->category_id = $request->category_id;
            //$update_product->sub_category_id = $request->sub_category_id;
            //$update_product->child_category_id = $request->child_category_id;
            $update_product->add_by = $request->add_by;
            $update_product->brand_id = $request->brand_id;
            $update_product->save();


       return back()->with('success', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $delete = Product::find($id);
        $images = explode('|',$delete->image);
        foreach($images as $image){
            unlink(public_path($image));
        }
        $delete->delete();
        return back()->with('success','Product Delete Success');
    }


    //===================== Best Seller Products
    public function bestSeller(){
        
        $best_products = BestSeller::all();

        $products = Product::all();
        $pageTitle = "Best Seller";
        return view('admin.product.bestseller', compact('products','pageTitle','best_products'));
    }

    public function bestSellerIput(Request $request){
        $best_all = bestSeller::all();
        if(($best_all->count())<5){
            $best_pro = new BestSeller();
            $best_pro->best_product_id = $request->best_product_id;
            $best_pro->save();
            return back()->with('success','Product Added Success');
        }
        return back()->with('error','You Must Add 5');
        
        
    }






}
