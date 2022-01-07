<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;

class CategoryController extends Controller
{
    //

    //============ Category

    public function categoriesCreate()
    {
        $categories = Category::orderBy('id','DESC')->get();
        $pageTitle = "Manage Category";
        return view('admin.category.index', compact('categories', 'pageTitle'));
    }

    public function addCategory(Request $request)
    {

        $request->validate([
            'name' => "required|unique:categories,name",
            'slug' => "required",
            'icon' => "nullable|mimes:jpeg,jpg,png,gif",
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->add_by = $request->add_by;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'category' . time() . '.' . $extension;
            $location = '/images/categories/';
            $file->move(public_path() . $location, $fileName);
            $category->icon = $location . $fileName;
        }
        $category->save();
        return back()->with('success', 'Category Added Success!');
    }


    public function categoriesEdit($id){
        $edit = Category::find($id);
        $pageTitle = "Edit Category";
        return view('admin.category.edit-category',compact('edit','pageTitle'));
    }
    public function categoriesUpdate(Request $request,$id){
        $update = Category::find($id);
        $old_icon = $update->icon;

        if($request->hasFile('icon')){
            if(isset($old_icon)){
                unlink(public_path($old_icon));
            }
            
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $fileName= 'category'. time() . '.' . $extension;
            $location= '/images/categories/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation = $location. $fileName;
            $update->icon = $imageLocation;

        }
            $update->name = $request->name;
            $update->slug = $request->slug;
            $update->add_by = $request->add_by;
            $update->save();


       return back()->with('success', 'Category Updated!');
    }



    public function categoriesDelete($id){
        $delete = Category::find($id);
        $delete->delete();
        return back()->with('success','Category Deleted Success');
    }




    //===============sub Category


    public function subCategoriesCreate()
    {
        $pageTitle = "Manage Category";
        $subcategories = SubCategory::all();
        $categories = Category::all();
        return view('admin.sub_category.index', compact('subcategories', 'categories','pageTitle'));
    }


    public function addSubCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
        ]);
        SubCategory::insert([
            'name' => $request->has('name') ? $request->input('name') : '',
            'slug' => $request->has('slug') ? $request->input('slug') : '',
            'category_id' => $request->get('category_id'),
            'add_by' => $request->get('add_by'),
        ]);

        return back()->with('success', 'Sub Category Added Success!');
    }

    public function subCategoriesEdit($id){
        $edit = SubCategory::find($id);
        $pageTitle = "Edit Sub Category";
        $categories = Category::all();
        return view('admin.sub_category.edit_sub_category',compact('pageTitle','edit','categories'));
    }

    public function subCategoriesUpdate(Request $request ,$id){
        $update = SubCategory::find($id);
        $update->name = $request->name;
        $update->slug = $request->slug;
        $update->category_id = $request->category_id;
        $update->add_by = $request->add_by;
        $update->save();
        return back()->with('success','Sub Category Item Updated');

    }

    public function subCategoriesDelete($id){
        $delete = SubCategory::find($id);
        $delete->delete();
        return back()->wuth('success','Sub Catgeory Item Deleted');
    }




    //================== child Category

    public function childCategoriesCreate(Request $request)
    {
        $pageTitle = "Manage Category";
        $categories = Category::all();
        $childCategory = ChildCategory::all();
        return view('admin.category.child-categories', compact('categories','childCategory','pageTitle'));
    }

    public function childSubCategories(Request $request)
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

    public function addchildCategories(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'sub_categories_id' => 'required|string|max:255',
        ]);
        ChildCategory::insert([
            'name' => $request->has('name') ? $request->input('name') : '',
            'slug' => $request->has('slug') ? $request->input('slug') : '',
            'sub_categories_id' => $request->get('sub_categories_id'),
            'add_by' => $request->get('add_by'),
        ]);

        return back()->with('success', 'Child Category Added!');
    }



}
