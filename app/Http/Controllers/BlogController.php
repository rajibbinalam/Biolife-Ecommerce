<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    //


    //============= Blog Category

public function blogCategorycreate(){
        $categories = BlogCategory::all();
        return view('admin.blog_category', compact('categories'));
        
    }

    public function blogCategoryInsert(Request $request){

         $request->validate([
            'name' => 'string|max:255',
            'slug' => 'string|max:255',
        ]);
                BlogCategory::insert([
                    'name'=> $request->input('name'),
                    'slug'=> $request->input('slug'),
                ]);
            
            
            return back()->with('success', 'Blog Category Added Success!');
        


        }


        public function blogCategoryDelete($id){
        $delete = BlogCategory::find($id)->first();
        $delete->delete();
        return back()->with('success','Blog Category Deleted!');
    }



//============= Blog Post

public function blogPostcreate(){
        $blogposts = BlogPost::all();
        //$tag = explode(',',$blogposts->tags);
        return view('admin.blog-post', compact('blogposts'));
        
    }

    public function addBlogPostcreate(){
         $categories = BlogCategory::all();
        return view('admin.add-blog-post', compact('categories'));
        //return view('admin.add-blog-post');
    }


    public function blogPostInsert(Request $request){

         if($request->hasFile('image')){
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'blogpost'. time() . '.' . $extension;
                $location= '/images/blog-post/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
            
                $tags[]=$request->input('tags');

                BlogPost::insert([
                    'title'=> $request->input('title'),
                    'auth_name'=> $request->input('auth_name'),
                    'details'=> $request->input('details'),
                    'tags'=> implode(',', $tags),
                    'blog_categories_id'=> $request->input('blog_categories_id'),
                    'image'=> $imageLocation,
                ]);
            
            
            return back()->with('success', 'Blog Post Added Success!');
         }  else{
                return back()->with('error', 'Somethink Wrong!');
            }


        }


        public function blogPostEdit($id){
            $edits = BlogPost::find($id);
            $categories = BlogCategory::all();
            return view('admin.blog-post-edit', compact('edits','categories'));
        
        }


        public function blogPostUpdate(Request $request, $id){
            $blogpost = BlogPost::find($id);
            $old_image = $blogpost->image;

         if($request->hasFile('image')){
            unlink(public_path($old_image));
            $file = $request->file('image');

                $extension = $file->getClientOriginalExtension();
                $fileName= 'blogpost'. time() . '.' . $extension;
                $location= '/images/blog/';
                $file->move(public_path() . $location, $fileName);
                $imageLocation= $location. $fileName;
        
                $blogpost->image = $imageLocation;
         }  else{

                $blogpost->image = $old_image;
            }

            $tags[]=$request->input('tags');

            $blogpost->title = $request->input('title');
            $blogpost->blog_categories_id = $request->input('blog_categories_id');
            $blogpost->details = $request->input('details');
            $blogpost->tags = implode(',', $tags);
            $blogpost->save();
            return redirect('/admin/blog-post')->with('success', 'Blog Post Update Success!');
        }



        public function blogPostDelete($id){
            $delete = BlogPost::find($id)->first();
            $delete->delete();
            unlink(public_path($delete->image));
            return back()->with('success','Blog Post Deleted!');
        }








}
