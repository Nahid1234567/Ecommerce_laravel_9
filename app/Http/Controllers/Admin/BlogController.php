<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Image;
use File;


class BlogController extends Controller
{
    
    //all category showing method
    public function index()
    {
        $data=DB::table('blog_category')->get();  //query builder
        return view('admin.blog.category',compact('data'));
        
    }
    public function show_contact()
    {
        $data=DB::table('contacts')->get();  //query builder
        return view('admin.contact.contact_message',compact('data'));
        
    }

    //store category
    public function store(Request $request)
    {
        $validated = $request->validate([
           'category_name' => 'required|max:55',
       ]);

        //query builder
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_slug']=Str::slug($request->category_name, '-');
        DB::table('blog_category')->insert($data);
         
        $notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        DB::table('blog_category')->where('id',$id)->delete();
        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $data=DB::table('blog_category')->where('id',$id)->first();
        return view('admin.blog.category_edit',compact('data'));
    }

    public function contact_edit($id){
        $data=DB::table('contacts')->where('id',$id)->first();
        return view('admin.contact.reply_message',compact('data'));
    }
    
    public function update(Request $request)
    {

        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_slug']=Str::slug($request->category_name, '-');
        DB::table('blog_category')->where('id',$request->id)->update($data);
        $notification=array('messege' => 'Category Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function contact_destroy($id){
        DB::table('contacts')->where('id',$id)->delete();
        return redirect()->back();
    }
}