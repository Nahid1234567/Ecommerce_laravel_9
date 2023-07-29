@extends('layouts.admin')

@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-3">Category</h1>
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
                        <h3 class="card-title">All Categories List here</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Categories</th>
                    <th>Categories Slug</th>
                    <th>Categories Icon</th>
                    <th>Show On homepage</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $key=>$row) 	
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $row->category_name }}</td>
                      <td>{{ $row->category_slug }}</td>
                      <td><img src="{{ asset($row->icon) }}" height="32" width="32"></td>
                      <td>
                         @if($row->home_page==1)
                           <span class="badge badge-success">Home Page</span>
                         @endif   
                      </td>
                      <td>
                      	<a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                      	<a href="{{ route('category.delete',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                      </td>
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
      <form action="{{route('cat.store')}}" method="post" enctype="multipart/form-data">  
        @csrf
  <div class="modal-body">
      
  <div class="mb-3">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" name="category_name" id="category_id" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>This is your main category
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Category Icon</label>
    <input type="file" class="form-control" name="icon" id="category_icon" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>This is your main category
  </div>
  <div class="form-group">
            <label for="category_name">Show on Homepage</label>
           <select class="form-control" name="home_page">
             <option value="1">Yes</option>
             <option value="0">No</option>
           </select>
            <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
  </div>  
 
  <button type="submit" class="btn btn-primary">Submit</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
    </form>  
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        
      </div>
    </div>
  </div>
</div>  
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('body').on('click','.edit', function(){
      let cat_id=$(this).data('id');
      $.get("category/edit/"+cat_id, function(data){
        $("#modal_body").html(data);
      });
    });
</script>
@endsection