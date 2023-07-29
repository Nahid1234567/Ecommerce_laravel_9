<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WarehouseController extends Controller
{
    public function warehouse(Request $request) {     
         $data=DB::table('warehouse')->get();
         return view('admin.Warehouse.index',compact('data'));         
       }

       public function store(Request $request){
        $validated = $request->validate([
            'warehouse_name' => 'required|unique:warehouse',
        ]);
        
            $data=array();      
            $data['warehouse_name']=$request->warehouse_name;
            $data['warehouse_address']=$request->warehouse_address;
            $data['warehouse_phone']=$request->warehouse_phone;    
            DB::table('warehouse')->insert($data);   
            return redirect()->back();
    }
            public function destroy($id){
            DB::table('warehouse')->where('id',$id)->delete();
            return redirect()->back();
    }
            public function edit($id){
            $data = DB::table('warehouse')->where('id',$id)->first();
            return response()->json($data);
        }
        public function update(Request $request){
            $validated = $request->validate([
                'warehouse_name' => 'required|max:44',
            ]);
            
                $data=array();  
                $data['id']=$request->id;    
                $data['warehouse_name']=$request->warehouse_name;
                $data['warehouse_address']=$request->warehouse_address;
                $data['warehouse_phone']=$request->warehouse_phone;    
                DB::table('warehouse')->where('id',$request->id)->update($data);   
                return redirect()->back();
        }

}
