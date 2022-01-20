<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Orders;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\Wishlist;
use App\Models\TopBanner;
use App\Models\SocialLink;
use App\Models\Subscriber;
use App\Models\BlogComment;
use App\Models\SubCategory;
use App\Models\BlogCategory;
use App\Models\BottomBanner;
use App\Models\MiddleBanner;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\Coupon;
use App\Models\ProductReview;
use App\Models\GeneralSetting;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

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
            return view('welcome2',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
        }
        if($pageNo == 3){
            return view('welcome3',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
        }
        if($pageNo == 4){
            return view('welcome4',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
        }
        if($pageNo == 5){
            return view('welcome5',compact('sliders','banner_product','products','middle_banners','deals','top_products','partiners','blog_posts'));
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

    // =========   Blog Comment
    public function blogComment(Request $request){
        $commet = new BlogComment();
        $commet->user_id = $request->user_id;
        $commet->blog_post_id = $request->blog_post_id;
        $commet->comment = $request->comment;
        $commet->save();
        return back();
    }

    //==== Single Blog Post
    public function singleBlog($id){
        $single = BlogPost::find($id);
        $pageTitle = "Post - Blog";
        $recent_posts = BlogPost::orderBy('created_at','DESC')->limit(3)->get();
        $blog_categories = BlogCategory::orderBy('created_at','DESC')->limit(6)->get();
        $post_comments = BlogComment::where('blog_post_id',$id)->get();
        return view('style1.single_blog',compact('pageTitle','single','recent_posts','blog_categories','post_comments'));
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
        $product_size = explode(',',$single_product->size);
        $product_color = explode(',',$single_product->colors);
        $pageTitle = "Products - ".$single_product->name;
        $product_reviews = ProductReview::where('product_id',$id)->get();
        return view('style1.single_product',compact('pageTitle','single_product','product_image','releted_products','product_reviews','product_size','product_color'));
    }

    
    //      ============= Add To Cart
    public function addToCart(Request $request){
        $id = $request->get('pid');
        $name = $request->get('name');
        $price = $request->get('new_price');
        $quantity = $request->get('quantity');
        $colors = $request->get('colors');
        // $image = $request->get('image');
        $size = $request->get('size');

        $images = Product::find($id)->image;
        $image = explode('|',$images)[0];

        $cart = Cart::content()->where('id',$id)->first();
        $Totalquantity = Product::find($id)->quantity;
        if($quantity > $Totalquantity){
            return back()->with('error','You Must select Less Then '.$Totalquantity);
        }else{
            if(isset($cart)&& $cart != null){
                $quantity = ((int)$quantity + (int)$cart->qty);
                $total = ((int)$quantity * (int)$price);
                Cart::update($cart->rowId,['qty'=>$quantity , 'options'=>['size'=>$size ,'colors'=>$colors , 'image'=>$image , 'total'=>$total]]);
            }else{
                $total = ((int)$quantity * (int)$price);
                Cart::add($id,$name,$quantity,$price,['size'=>$size , 'colors'=>$colors , 'image'=>$image , 'total'=>$total]);
            }
            
            return back()->with('success','Product Added To Cart');
        }
        
    }

    public function UpdateCart(Request $request){
        $id = $request->get('pid');
        $name = $request->get('name');
        $price = $request->get('new_price');
        $quantity = $request->get('quantity');
        $colors = $request->get('colors');
        // $image = $request->get('image');
        $size = $request->get('size');

        $images = Product::find($id)->image;
        $image = explode('|',$images)[0];

        $cart = Cart::content()->where('id',$id)->first();
        $Totalquantity = Product::find($id)->quantity;
        if($quantity > $Totalquantity){
            return back()->with('error','You Must select Less Then '.$Totalquantity);
        }else{
            if(isset($cart)&& $cart != null){
                // $quantity = ((int)$quantity + (int)$cart->qty);
                $total = ((int)$quantity * (int)$price);
                Cart::update($cart->rowId,['qty'=>$quantity , 'options'=>['size'=>$size ,'colors'=>$colors , 'image'=>$image , 'total'=>$total]]);
            }else{
                $total = ((int)$quantity * (int)$price);
                Cart::add($id,$name,$quantity,$price,['size'=>$size ,'colors'=>$colors , 'image'=>$image , 'total'=>$total]);
            }
            
            return back()->with('success','Product Added To Cart');
        }
    }


    public function checkOut(){
        $pageTitle = "My Cart";
        $carts = Cart::content();
        $subTotal = Cart::subtotal();
        $count = Cart::count();
        $tex = Cart::tax();
        $shipping_methods = ShippingMethod::all();
        return view('checkout',compact('carts','subTotal','count','tex','pageTitle','shipping_methods'));
    }
    public function customerBillingUpdate(Request $request, $id){
        $updateCustomer = User::find($id);
        $updateCustomer->name = $request->name;
        $updateCustomer->email = $request->email;
        $updateCustomer->phone = $request->phone;
        $updateCustomer->district = $request->district;
        $updateCustomer->zip = $request->zip;
        $updateCustomer->address = $request->address;
        $oldImage = $updateCustomer->image;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName= 'user_'. time() . '.' . $extension;
            $location= '/images/user/';
            $file->move(public_path() . $location, $fileName);
            $imageLocation= $location. $fileName;
        }else{
            $imageLocation= $oldImage;
        }
        $updateCustomer->image = $imageLocation;
        $updateCustomer->save();
        return back();
    }


    public function removeItem($rowId){
        Cart::remove($rowId);
        return back()->with('success','Item Remove from Cart');
    }

   
//================    Order Product
    public function orderProduct(){
        foreach(Cart::content() as $cart){
            $order = new Orders();
            $order->order_number = 'BIOLIFE'.time();
            $order->product_id = $cart->id;
            $order->user_id = Auth::user()->id;
            $order->total_cost = $cart->price;
            $order->quantity = $cart->qty;
            $order->size = $cart->options['size'];
            $order->color = $cart->options['colors'];
            // $order->name = $cart->name;
            $order->save();
        }
        // Cart::destroy();
        return redirect()->route('paymentMethod')->with('success','Your Order Confirmed');
        
    }

    public function myOrder(){
        $pageTitle = "My Order List";
        $user = Auth::user()->id;
        $myOrders = Orders::where('user_id',$user)->orderBy('id','DESC')->get();
        return view('my-order',compact('pageTitle','myOrders'));
    }

    public function userProfile(){
        $pageTitle = "User Profile";
        return view('my-profile',compact('pageTitle'));
    }


 //===============  payment Methods
    public function paymentMethod(){
        return view('/payment');
    }
        //================= Wishlist 
        public function addWishlist(Request $request){
            $wishlist = new Wishlist();
            $wishlist->user_id = $request->user_id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();
            return back();
        }

        public function MyWishlist($user_id){
            $pageTitle = "My Wishlist";
            //$allWishlist = Wishlist::all();
            $wishlists[] = Wishlist::where('user_id',$user_id)->get('product_id');
            $products = Product::whereIn('id',$wishlists[0])->get();
            return view('style1.wishlist',compact('products','pageTitle','wishlists'));
        }

        public function removeWishlist($user_id, $product_id){
            $delete = Wishlist::where('user_id',$user_id)->where('product_id',$product_id)->delete('id');
            return back()->with('success','My Wishlist Item Deleted Success');
        }




        public function productReview(Request $request){
            //dd($request->all());
            $review = new ProductReview();
            $review->star = $request->input('star');
            $review->user_id = $request->input('user_id');
            $review->product_id = $request->input('product_id');
            $review->comment = $request->input('comment');
            $review->save();
            return back()->with('success','Thanks for your review');
        }

}
