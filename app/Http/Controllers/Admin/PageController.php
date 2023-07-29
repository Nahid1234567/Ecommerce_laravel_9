<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
class PageController extends Controller
{
    public function index(){
        $data = DB::table('pages')->get();
        return view('admin.setting.page.index',compact('data'));
    }
    public function create(){
        
        return view('admin.setting.page.create');
    }
    public function store(Request $request){
        $data=array();
        $data['page_position']=$request->page_position;
        $data['page_name']=$request->page_name;
        $data['page_slug']=Str::slug($request->page_name, '-');
        $data['page_title']=$request->page_title;
        $data['page_description']=$request->page_description;
        DB::table('pages')->insert($data);
        return redirect()->back();
        
    }
    public function destroy($id){
        DB::table('pages')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function edit($id){
        $page=DB::table('pages')->where('id',$id)->first();
        return view('admin.setting.page.edit',compact('page'));
    }
    public function update(Request $request, $id){
        $data=array();
        $data['page_position']=$request->page_position;
        $data['page_name']=$request->page_name;
        $data['page_slug']=Str::slug($request->page_name, '-');
        $data['page_title']=$request->page_title;
        $data['page_description']=$request->page_description;
        DB::table('pages')->where('id',$id)->update($data);
        return redirect()->back();
        
    }
}
