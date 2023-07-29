<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Review;
use DB;
class IndexController extends Controller
{
  public function index(){

     $category = DB::table('categories')->get();
     
     $product = DB::table('products')->get();
     $bannerproduct = Product::where('product_slider',1)->first();
     $brand = DB::table('brands')->where('front_page',1)->limit(24)->get();
     $featured=Product::where('status',1)->where('featured',1)->orderBy('id','DESC')->limit(16)->get();
     $popular_product=Product::where('status',1)->orderBy('product_views','DESC')->limit(16)->get();
     $trendy_product=DB::table('products')->where('status',1)->where('trendy',1)->orderBy('id','DESC')->limit(8)->get();
     $todaydeal=Product::where('status',1)->where('today_deal',1)->orderBy('id','DESC')->limit(6)->get();
     $home_category=DB::table('categories')->where('home_page',1)->orderBy('category_name','ASC')->get();
     $random_product = DB::table('products')->where('status',1)->inRandomOrder()->limit(16)->get();
     $review=DB::table('wbreviews')->where('status',1)->orderBy('id','DESC')->limit(12)->get();
     $campaign=DB::table('campaigns')->where('status',1)->orderBy('id','DESC')->first();
     return view('frontend.index',compact('category','bannerproduct','featured','popular_product','trendy_product','product','home_category','brand','random_product','todaydeal','review','campaign'));
  }

  public function productDetails($slug){
    
    $product=Product::where('slug',$slug)->first();
    DB::table('products')->where('slug',$slug)->increment('product_views');   
    $relatedproduct = DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
    $review=Review::where('product_id',$product->id)->orderBy('id','DESC')->take(6)->get();
    $featured=Product::where('status',1)->where('featured',1)->orderBy('id','DESC')->limit(16)->get();
    
            $shareButtons1 = \Share::page(
                'https://makitweb.com/datatables-ajax-pagination-with-search-and-sort-in-laravel-8/'
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->telegram()
        ->whatsapp()
        ->reddit();

    return view('frontend.product_details',compact('product','relatedproduct','review','shareButtons1'));
  }

  public function ProductQuickView($id)
  {
      $product=Product::where('id',$id)->first();
      return view('frontend.product.quick_view',compact('product'));
  }

  public function categoryWiseProduct($id)
  {
      $category=DB::table('categories')->where('id',$id)->first();
      $subcategory=DB::table('subcategories')->where('category_id',$id)->get();
      $brand=DB::table('brands')->get();
      $products=DB::table('products')->where('category_id',$id)->paginate(60);
      $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
      return view('frontend.product.category_products',compact('subcategory','brand','products','random_product','category'));

  }

  public function SubcategoryWiseProduct($id)
  {
      $subcategory=DB::table('subcategories')->where('id',$id)->first();
      $childcategories=DB::table('childcategories')->where('subcategory_id',$id)->get();
      $brand=DB::table('brands')->get();
      $products=DB::table('products')->where('subcategory_id',$id)->paginate(60);
      $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
      return view('frontend.product.subcategory_product',compact('childcategories','brand','products','random_product','subcategory'));
  }

  public function ChildcategoryWiseProduct($id)
  {
      $childcategory=DB::table('childcategories')->where('id',$id)->first();
      $categories=DB::table('categories')->get();
      $brand=DB::table('brands')->get();
      $products=DB::table('products')->where('childcategory_id',$id)->paginate(60);
      $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
      return view('frontend.product.childcategory_product',compact('categories','brand','products','random_product','childcategory'));
  }

  public function BrandWiseProduct($id)
  {
      $brand=DB::table('brands')->where('id',$id)->first();
      $categories=DB::table('categories')->get();
      $brands=DB::table('brands')->get();
      $products=DB::table('products')->where('brand_id',$id)->paginate(60);
      $random_product=Product::where('status',1)->inRandomOrder()->limit(16)->get();
      return view('frontend.product.brandwise_product',compact('categories','brands','products','random_product','brand'));
  }

  public function ViewPage($page_slug)
    {
        $page=DB::table('pages')->where('page_slug',$page_slug)->first();
        return view('frontend.page',compact('page'));
    }

    public function storeNewsletter(Request $request)
    {
        $email=$request->email;
        $check=DB::table('newsletters')->where('email',$email)->first();
        if ($check) {
            return response()->json('Email Already Exist!');
        }else{
              $data=array();
              $data['email']=$request->email;
              DB::table('newsletters')->insert($data);
              return response()->json('Thanks for subscribe us!');  
        }
       
    }

    public function OrderTracking()
    {
        return view('frontend.order_tracking');
    }

    public function CheckOrder(Request $request)
    {
        $check=DB::table('orders')->where('order_id',$request->order_id)->first();
        if ($check) {
            $order=DB::table('orders')->where('order_id',$request->order_id)->first();
            $order_details=DB::table('order_details')->where('order_id',$order->id)->get();
            return view('frontend.order_details',compact('order','order_details'));
        }else{
            $notification=array('messege' => 'Invalid OrderID! Try again.', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function Contact()
    {
        return view('frontend.contact');
    }

    public function Show_contact(Request $request){

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['message']=$request->message;
        DB::table('contacts')->insert($data);
        return redirect()->back();
    
   }

   public function CampaignProduct($id)
   {
       $products=DB::table('campaign_product')->leftJoin('products','campaign_product.product_id','products.id')
                   ->select('products.name','products.code','products.thumbnail','products.slug','campaign_product.*')
                   ->where('campaign_product.campaign_id',$id)
                   ->paginate(32);          
       return view('frontend.campaign.product_list',compact('products'));
   }

   //__campaign product details__//
   public function CampaignProductDetails($slug)
   {   
       
       $product=DB::table('products')->where('slug',$slug)->first();
       $product=DB::table('products')->where('slug',$slug)->increment('product_views');
       $product_price=DB::table('campaign_product')->where('product_id',$product->id)->first();         
       $related_product=DB::table('campaign_product')->leftJoin('products','campaign_product.product_id','products.id')
                   ->select('products.name','products.code','products.thumbnail','products.slug','campaign_product.*')
                   ->inRandomOrder(12)->get();
       $review=Review::where('product_id',$product->id)->orderBy('id','DESC')->take(6)->get();
       return view('frontend.campaign.product_details',compact('product','related_product','review','product_price'));
    }
}
