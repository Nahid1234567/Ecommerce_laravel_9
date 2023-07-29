<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{
    public function index(){
        $data = DB::table('categories')->get();
        return view('admin.category.index',compact('data'));
    }
    public function store(Request $request)
    {
    	$validated = $request->validate([
           'category_name' => 'required|max:55',
           'icon' => 'required',
       ]);

    
          $data=array();
          $data['category_name']=$request->category_name;
          $data['category_slug']=Str::slug($request->category_name, '-');
          $data['home_page']=$request->home_page;

          $photo=$request->icon;
          $slug=Str::slug($request->category_name, '-');       
          $photoname=$slug.'.'.$photo->getClientOriginalExtension();
            
          $data['icon']='files/category/'.$photoname;  
          DB::table('categories')->insert($data);
    	$notification=array('messege' => 'Category Inserted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }

    public function GetChildCategory($id){
        $data = DB::table('childcategories')->where('subcategory_id',$id)->get();
        return response()->json($data);
    }
    public function update(Request $request)
    {
      
        $slug=Str::slug($request->category_name, '-');
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_slug']=$slug;
        $data['home_page']=$request->home_page;
        if ($request->icon) {
              if (File::exists($request->old_icon)) {
                     unlink($request->old_icon);
                }
              $photo=$request->icon;
              $photoname=$slug.'.'.$photo->getClientOriginalExtension();
              Image::make($photo)->resize(32,32)->save('files/category/'.$photoname); 
              $data['icon']='files/category/'.$photoname; 
              DB::table('categories')->where('id',$request->id)->update($data); 
              $notification=array('messege' => 'Category Update!', 'alert-type' => 'success');
              return redirect()->back()->with($notification);
        }else{
          $data['icon']=$request->old_icon;   
          DB::table('categories')->where('id',$request->id)->update($data); 
          $notification=array('messege' => 'Category Update!', 'alert-type' => 'success');
          return redirect()->back()->with($notification);
        }
    } 
    public function edit($id){
        $data=DB::table('categories')->where('id',$id)->first();
        return view('admin.Category.edit',compact('data'));
    }
    public function destroy($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back();
    }
   
}
