<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BottomBanner;
use App\Models\TopBanner;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Contact;
use App\Models\GeneralSetting;
use App\Models\Message;
use App\Models\MiddleBanner;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\HomePage;
use App\Models\Brand;

class HomeController extends Controller
{


    public function Home(){

        $sliders = Slider::all();
        $middle_banners = MiddleBanner::orderBy('created_at')->limit(1)->get();
        $bottom_banners = BottomBanner::orderBy('created_at')->limit(1)->get();
        $deals = Product::orderBy('created_at')->limit(3)->get();
        $banner_product = Product::orderBy('created_at')->limit(5)->get();
        $products = Product::orderBy('created_at')->limit(8)->get();
        $top_products = Product::orderBy('created_at')->limit(12)->get();
        $partiners = Partner::all();
        $blog_posts = BlogPost::orderBy('created_at')->limit(6)->get();

        $feature_page = HomePage::first();
        $categories = Category::all();

        $pageNo = $feature_page->web_page;
        if($pageNo == 1){
            return view('welcome',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts','categories','bottom_banners'));
        }
        if($pageNo == 2){
            return view('welcome1',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
        }
        if($pageNo == 3){
            return view('welcome2',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
        }
        if($pageNo == 4){
            return view('welcome3',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
        }
        if($pageNo == 5){
            return view('welcome4',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
        }

        
    }

    public function allProducts(){
        $pageTitle = "Shop Your Fevourite Items";
        $brands = Brand::all();
        $products = Product::orderBy('id','DESC')->get();
        return view('style1.all_products',compact('products','pageTitle','brands'));
    }

    //============== Subscrib section
    public function subscribe(Request $request){
        $subscribe = new Subscriber();
        $subscribe->email = $request->email;
        $subscribe->save();
        return back();

    }
    // ============  Contact Page
    public function contactPage(){
        $pageTitle = "Contact Page";
        return view('style1.contact',compact('pageTitle'));
    }
    public function contactMessage(Request $request){
        $message = new Message();
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        return back();
    }

    //========  Blog Posts
    public function blogs(){
        $pageTitle = "Blog Page";
        $blog_posts = BlogPost::orderBy('created_at','DESC')->limit(8)->get();
        return view('style1.blog',compact('pageTitle','blog_posts'));
    }

    //==== Single Blog Post
    public function singleBlog($id){
        $single = BlogPost::find($id);
        $pageTitle = "Post - Blog";
        $recent_posts = BlogPost::orderBy('created_at','DESC')->limit(3)->get();
        $blog_categories = BlogCategory::orderBy('created_at','DESC')->limit(6)->get();
        return view('style1.single_blog',compact('pageTitle','single','recent_posts','blog_categories'));
    }

    //============= category wise Products
    public function CategoryWise(){
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $pageTitle = "Products - Category Wise";
        $products = Product::orderBy('created_at','DESC')->get();
        return view('style1.categorywise',compact('pageTitle','categories','subcategories','products'));
    }
    //============= Brand wise Products
    public function BrandWise(){
        $brands = Brand::all();
       //$subcategories = SubCategory::all();
        $pageTitle = "Products - Brand Wise";
        $products = Product::orderBy('created_at','DESC')->get();
        return view('style1.brandwise',compact('pageTitle','brands','products'));
    }




    //============ Single Products

    public function singleProduct($id){
        $single_product = Product::find($id);
        $releted_products = Product::where('category_id', $single_product->category_id)->where('id','!=',$single_product->id)->limit(8)->get();
        $product_image = explode('|',$single_product->image);
        $pageTitle = "Products - ".$single_product->name;
        return view('style1.single_product',compact('pageTitle','single_product','product_image','releted_products'));
    }


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











}
