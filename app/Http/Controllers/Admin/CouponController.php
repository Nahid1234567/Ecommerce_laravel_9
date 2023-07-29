<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
  public function coupon(Request $request) {
    
     $data= DB::table('coupons')->get();
   
     return view('admin.Offer.Coupon.index',compact('data'));
     
   }
   public function store(Request $request){
    $validated = $request->validate([
        'coupon_code' => 'required|max:22',
    ]);
    
        $data=array();      
        $data['coupon_code']=$request->coupon_code;
        $data['type']=$request->type;
        $data['coupon_amount']=$request->coupon_amount;  
        $data['valid_date']=$request->valid_date; 
        $data['status']=$request->status; 
         
        $data= DB::table('coupons')->insert($data);
        return redirect()->back();
     }
     public function destroy($id){
      DB::table('coupons')->where('id',$id)->delete();
      return redirect()->back();
    }
}                                                                         
