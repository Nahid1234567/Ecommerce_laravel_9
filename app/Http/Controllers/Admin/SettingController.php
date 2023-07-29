<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class SettingController extends Controller
{
  
    public function index(){
        $data = DB::table('seo')->first();
        return view('admin.setting.seo',compact('data'));
    }
    public function smtp(){
        $smtp = DB::table('smtp')->first();
        return view('admin.setting.smtp',compact('smtp'));
    }
    public function seoupdate(Request $request, $id){
        $data=array();
        $data['id']=$request->id;
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_description']=$request->meta_description;
        $data['meta_keyword']=$request->meta_keyword;
        $data['google_verification']=$request->google_verification;
        $data['alexa_verification']=$request->alexa_verification;
        $data['google_analytics']=$request->google_analytics;
        DB::table('seo')->where('id',$id)->update($data);
        return redirect()->back();
    }                                                                      
    public function smtpupdate(Request $request, $id){
        $data=array();
        $data['mailer']=$request->mail_mailer;
        $data['host']=$request->mail_host;
        $data['port']=$request->mail_port;
        $data['username']=$request->mail_username;
        $data['password']=$request->mail_password;
        DB::table('smtp')->where('id',$id)->update($data);

    }
    public function website(){
        $setting = DB::table('setting')->first();
        return view('admin.setting.website_setting',compact('setting'));
    }

    public function webupdate(Request $request)
    {
        $data=array();
        $data['id']=$request->id;
        $data['currency']=$request->currency;
        $data['phone_one']=$request->phone_one;
        $data['phone_two']=$request->phone_two;
        $data['main_email']=$request->main_email;
        $data['support_email']=$request->support_email;
        $data['address']=$request->address;
        $data['facebook']=$request->facebook;
        $data['twitter']=$request->twitter;
        $data['instagram']=$request->instagram;
        $data['linkedIn']=$request->linkedIn;
        $data['instagram']=$request->instagram;  
        $data['youtube']=$request->youtube; 
         
        if($request->logo){
            $logo=$request->logo;
            $logo_name=uniqid().'.'.$logo->getClientOriginalExtension();
            image::make($logo)->resize(320,120)->save('files/setting/'.$logo_name);
            $data['logo']='files/setting/'.$logo_name;
        }
        else{
            $data['logo']=$request->old_logo;
        }
        if($request->favicon){
            $favicon=$request->favicon;
            $favicon_name=uniqid().'.'.$favicon->getClientOriginalExtension();
            image::make($favicon)->resize(320,120)->save('files/setting/'.$favicon_name);
            $data['favicon']='public/files/setting/'.$favicon_name;
        }
        else{
            $data['favicon']=$request->old_favicon;
        }
        DB::table('setting')->where('id',$request->id)->update($data);
        return redirect()->back();
    }

    public function PaymentGateway()
    {
        $aamarpay=DB::table('payment_gateway_bd')->first();
        $surjopay=DB::table('payment_gateway_bd')->skip(1)->first();
        $ssl=DB::table('payment_gateway_bd')->skip(2)->first();
        return view('admin.bdpayment_gateway.edit',compact('aamarpay','surjopay','ssl'));
    }

    public function AamarpayUpdate(Request $request)
    {
        $data=array();
        $data['store_id']=$request->store_id;
        $data['signature_key']=$request->signature_key;
        $data['status']=$request->status;
        DB::table('payment_gateway_bd')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'Payment Gateway Update Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    //__update surjopay
    public function SurjopayUpdate(Request $request)
    {
        $data=array();
        $data['store_id']=$request->store_id;
        $data['signature_key']=$request->signature_key;
        $data['status']=$request->status;
        DB::table('payment_gateway_bd')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'Payment Gateway Update Updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
           
}
