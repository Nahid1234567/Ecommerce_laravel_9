<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use DB;
use File;
class BrandController extends Controller
{
  public function index(){
    $data = DB::table('brands')->get();
    return view('admin.Brand.index',compact('data'));
}
       
        public function store(Request $request){
          $validated = $request->validate([
              'brand_name' => 'required|unique:brands|max:55',
          ]);
          $slug=Str::slug($request->brand_name, '-');
          $data=array(); 
          $data['brand_name']=$request->brand_name;
          $data['front_page']=$request->front_page;
          $data['brand_slug']=Str::slug($request->brand_name, '-');
          $photo = $request->brand_logo;
          $photoname=$slug.'.'.$photo->getClientOriginalExtension();
          
          $photo->move('files/brand/',$photoname);
          $data['brand_logo']='files/brand/'.$photoname;
          DB::table('brands')->insert($data);
          return redirect()->back();

      }
      public function destroy($id){
        $data=DB::table('brands')->where('id',$id)->first();
        $image=$data->brand_logo;
        if(File::exists($image)){
          unlink($image);
        }
        DB::table('brands')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function edit($id){
      $data = DB::table('brands')->where('id',$id)->first();
      return view('admin.Brand.edit',compact('data'));
    }
    public function update(Request $request){
      $validated = $request->validate([
          'brand_name' => 'required|unique:brands|max:55',
      ]);
      $slug=Str::slug($request->brand_name, '-');
      $data=array(); 
      $data['id']=$request->id;
      $data['brand_name']=$request->brand_name;
      $data['brand_slug']=Str::slug($request->brand_name, '-');
      if($request->hasfile('brand_logo')){
        $destination='files/brand/'.$data->brand_logo;
        if(File::exists($destination)){
          unlink($destination);
        }
          $photo = $request->file('brand_logo');
          $extension=$photo->getClientOriginalExtension();
          $photoname=time().'.'.getClientOriginalExtension();
          $photo->move('files/brand/',$photoname);
          $data->brand_logo=$photoname;
          return redirect()->back();
      }               
          DB::table('brands')->where('id',$request->id)->update($data);
          return redirect()->back();
           
  }
}