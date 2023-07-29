@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class ="breadcrumb float-sm-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add New Category</button>
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
                        <h3 class="card-title">All Sub Categories List here</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Sub Category Name</th>
                    <th>Sub Category Slug</th>
                    <th>Category Name</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=>$row)
                        <tr>                              
                                <td>{{$key+1}}</td>
                                <td>{{$row->subcategory_name}}</td>
                                <td>{{$row->subcat_slug}}</td>
                                <td>{{$row->category_name}}</td>
                                <td>
                                <a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-id="{{$row->id}}" data-target="#editModal"><i class="fas fa-edit"></i>edit</a>
                                <a href="{{route('subcategory.delete',$row->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                <td>
                        </tr>
                    @endforeach
                     </tbody>
                   </table>                  
              </div>
           </div>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('subcategory.store')}}" method="post">  
        @csrf
        
     
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Category Name</label>
          <select class="form-control" name="category_id">
            @foreach($category as $row)      
              <option value="{{$row->id}}">{{$row->category_name}}</option>
            @endforeach
          <select>
          <div id="emailHelp" class="form-text"></div>This is subcategory
        </div>
    
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Sub Category Name</label>
      <input type="text" class="form-control" name="subcategory_name" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text"></div>This is your main category
    </div>

 
<button type="submit" class="btn btn-primary">Submit</button>
   <div>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>     
      </div> 
      <form action="{{route('subcategory.update')}}" method="post" id="add-form">  
        @csrf
           <div class="modal-body">
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <select class="form-control" name="category_id" id="e_category_id">
                              @foreach($category as $row)      
                                <option value="{{$row->id}}"> {{$row->category_name}}
                                <option>
                              @endforeach
                            <select>
                          </div>
                             
                            <div class="form-group">
                              <label for="exampleInputEmail1" class="form-label">Sub Category Name</label>
                              <input type="text" name="subcategory_name" id="e_subcategory_name" class="form-control" id="exampleInputEmail1"  required>
                              <input type="hidden" class="form-control" name="id" id="e_subcategory_id">
                              <div id="emailHelp" class="form-text"></div>This is your main category
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" ></script>
  <script>
  $('body').on('click','.edit', function(){
      let subcatid=$(this).data('id');
      $.get("subcategory/edit/"+subcatid, function(data){
        $('#e_category_id').val(data.category_id);
        $('#e_subcategory_name').val(data.subcategory_name);
        $('#e_subcategory_id').val(data.id);
      });
    });
  </script>

@endsection