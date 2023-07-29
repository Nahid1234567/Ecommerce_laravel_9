@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-3">Warehouse</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class ="breadcrumb float-sm-right">
                <button class="btn btn-primary m-4" data-toggle="modal" data-target="#categoryModal">+ Add New</button>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Warehouse List</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">                                                            
                    <table id="example2" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Warehouse Name</th>
                            <th>Warehouse Address</th>
                            <th>Warehouse Phone</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key=>$row)
                        <tr>                              
                                <td>{{$key+1}}</td>
                                <td>{{$row->warehouse_name}}</td>
                                <td>{{$row->warehouse_address}}</td>
                                <td>{{$row->warehouse_phone}}</td>
                                <td>
                                <a href="#" class="btn btn-info btn-sm edit" data-id="{{$row->id}}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('warehouse.delete',$row->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                <td>
                        </tr>
                    @endforeach
                    </tbody>
            
                  </table>
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Warehouse</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <form action="{{route('warehouse.store')}}" method="post" id="add-form">  
        @csrf
        
    <div class="modal-body">
      
    
        
     
       
    
      
      <div class="form-group">
        <label for="exampleInputEmail1">WareHouse Name</label>
        <input type="text" class="form-control" name="warehouse_name" aria-describedby="emailHelp" placeholder="WareHouse Name">
        <div id="emailHelp" class="form-text"></div>
     </div>
    
   
      
      <div class="form-group">
        <label for="exampleInputEmail1">WareHouse Address</label>
        <input type="text" class="form-control" name="warehouse_address" id="category_id" aria-describedby="emailHelp" placeholder="WareHouse Address">
        <div id="emailHelp" class="form-text"></div>
    </div>
    
      
    <div class="form-group">
        <label for="exampleInputEmail1">WareHouse Phone</label>
        <input type="text" class="form-control" name="warehouse_phone" id="category_id" aria-describedby="emailHelp" placeholder="WareHouse Phone">
        <div id="emailHelp" class="form-text"></div>
    </div>
    
 
      <button type="submit" class="btn btn-primary"><span class="d-none loader"><span class="submit_btn"></span></span> Submit</button>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Warehouse Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>     
      </div> 
      <form action="{{route('warehouse.update')}}" method="post">  
        @csrf
                                                        
        <div class="modal-body">                   
                            <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Warehouse Name</label>
                              <input type="text" name="warehouse_name" id="e_warehouse_name" class="form-control"  required>
                              <input type="hidden" class="form-control" name="id" id="e_warehouse_name_id">
                              <div id="emailHelp" class="form-text"></div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Warehouse Address</label>
                              <input type="text" name="warehouse_address" id="e_warehouse_address" class="form-control" required>
                              <input type="hidden" class="form-control" name="e_warehouse_address_name_id" id="e_warehouse_address_id">
                              <div id="emailHelp" class="form-text"></div>
                            <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Warehouse Phone Number</label>
                              <input type="text" name="warehouse_phone" id="e_warehouse_phone" class="form-control"  required>
                              <input type="hidden" class="form-control" name="e_warehouse_phone_name_id" id="e_warehouse_phone_id">
                              <div id="emailHelp" class="form-text"></div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      
                        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
      </form>
    </div> 

  
      </div>
     
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('body').on('click','.edit', function(){
      let ware_id=$(this).data('id');
      $.get("warehouse/edit/"+ware_id, function(data){
        $('#e_warehouse_name').val(data.warehouse_name);
        $('#e_warehouse_name_id').val(data.id);
        $('#e_warehouse_address').val(data.warehouse_address);
        $('#e_warehouse_address_id').val(data.e_warehouse_address_name_id);     
        $('#e_warehouse_phone').val(data.warehouse_phone);
        $('#e_warehouse_phone_id').val(data.e_warehouse_phone_name_id);
     
      });
    });
</script>


@endsection