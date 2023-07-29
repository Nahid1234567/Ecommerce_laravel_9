<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;

class PickUpPointController extends Controller
{

   
    public function pickup_point(Request $request) {
        if($request->ajax()){
         $data= DB::table(
         'pickup_point')->get();
         return DataTables::of($data)
         ->addIndexColumn()
          ->addColumn('action',function($row){
             $action='<a href="#" class="btn btn-info btn-sm edit" data-id="'.$row->id.'" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
             <a href="'.route('pickup_point.delete',[$row->id]).'" class="btn btn-danger btn-sm" id="delete-pickup"><i class="fas fa-trash"></i></a>';
             return $action;
     
          })
          ->rawColumns(['action'])
          ->make(true);        
        }
        return view('admin.pickup_point.index');
    }
    public function store(Request $request){
       
        
            $data=array();      
            $data['pickup_point_name']=$request->pickup_point_name;
            $data['pickup_point_address']=$request->pickup_point_address;
            $data['pickup_point_phone']=$request->pickup_point_phone; 
            $data['pickup_point_phone_two']=$request->pickup_point_phone_two;   
            DB::table('pickup_point')->insert($data);   
            return redirect()->back();
    }
    public function destroy($id){
        DB::table('pickup_point')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        $data = DB::table('pickup_point')->where('id',$id)->first();
        return response()->json($data);
    }
    public function update(Request $request){       
        
        $data=array();  
        $data['id']=$request->id;    
        $data['pickup_point_name']=$request->pickup_point_name;
        $data['pickup_point_address']=$request->pickup_point_address;
        $data['pickup_point_phone']=$request->pickup_point_phone; 
        $data['pickup_point_phone_two']=$request->pickup_point_phone_two;   
        DB::table('pickup_point')->where('id',$request->id)->update($data);   
        return redirect()->back();
    }
}
