<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;

class SubCategoryController extends Controller
{
    

    public function index(){
        
        $data=DB::table('subcategories')->leftjoin('categories', 'subcategories.category_id','categories.id')
        ->select('subcategories.*','categories.category_name')->get();
        $category=DB::table('categories')->get();
        return view('admin.Subcategory.index', compact('data','category'));

    }

    public function store(Request $request){
        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);
        
            $data=array();      
            $data['category_id']=$request->category_id;
            $data['subcategory_name']=$request->subcategory_name;
            $data['subcat_slug']=Str::slug($request->subcategory_name);    
            DB::table('subcategories')->insert($data);   
            return redirect()->back();
    }
    public function edit($id){
        $data = DB::table('subcategories')->where('id',$id)->first();
        return response()->json($data);
    }
                         
   public function update(Request $request){
    
    $data=array();      
    $data['id']=$request->id;
    $data['category_id']=$request->category_id;
    $data['subcategory_name']=$request->subcategory_name;
    $data['subcat_slug']=Str::slug($request->subcategory_name);    
    DB::table('subcategories')->where('id', $request->id)->update($data);   
    return redirect()->back();  
       
   }
   


}
