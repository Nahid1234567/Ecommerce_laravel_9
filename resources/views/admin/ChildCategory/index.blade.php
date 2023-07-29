@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Child Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class ="breadcrumb float-sm-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ Add New</button>
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
                            <h3 class="card-title">All Child Categories List here</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">                                                            
                    <table id="example2" class="table table-bordered table-striped table-sm ytable">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>ChildCategory Name</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
            
                    </table>
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Child Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <form action="{{route('childcategory.store')}}" method="post"  enctype="multipart/form-data">  
        @csrf
      
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Category/SubCategory</label>
          <select class="form-control" name="subcategory_id" required>
            @foreach($category as $row)
                  @php 
                    $subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
                  @endphp
                  <option style="color: blue;"
                  >{{ $row->category_name }}</option>
                  @foreach($subcat as $row)
            	        <option value="{{ $row->id }}"> ---- {{ $row->subcategory_name }}</option>
                  @endforeach    
            	@endforeach
          <select>
          <div id="emailHelp" class="form-text"></div>This is subcategory
        </div>
        
     
       
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ChildCategory Name</label>
      <input type="text" class="form-control" name="childcategory_name" id="exampleInputEmail1" aria-describedby="emailHelp">
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Child Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

      </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
    $(function childcategory(){
        var table=$('.ytable').DataTable({
            processing : true,
            serverSide: true,
            retrieve: true,
            paging: false,
            destroy: true,
            ajax:"{{route('childcategory.index')}}",
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'childcategory_name', name:'childcategory_name'},
                {data:'category_name', name:'category_name'},
                {data:'subcategory_name', name:'subcategory_name'},
                {data:'action', name:'action', orderable:true, searchable:true},                
            ]
        });
        
    });

    $('body').on('click','.edit', function(){
      let id=$(this).data('id');
      $.get("/childcat/edit/"+id, function(data){
        $("#modal_body").html(data)
      });
    });

   
</script>

@endsection