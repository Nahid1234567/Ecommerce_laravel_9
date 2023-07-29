@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class ="breadcrumb float-sm-right">
            <a href="{{route('create.page')}}" class="btn btn-primary">+ Add New</a>
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
                        <h3 class="card-title">All Page List here</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Page Name</th>
                    <th>Page Title</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=>$row)
                        <tr>                              
                                <td>{{$key+1}}</td>
                                <td>{{$row->page_name}}</td>
                                <td>{{$row->page_title}}</td>
                                <td>
                                <a href="{{route('page.edit',$row->id)}}" class="btn btn-info btn-sm edit" ><i class="fas fa-edit"></i></a>
                                    <a href="{{route('page.delete',$row->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
      <form action="{{route('category.store')}}" method="post">  
        @csrf
  <div class="modal-body">
      
  <div class="mb-3">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" name="category_name" id="category_id" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>This is your main category
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

   
    
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('category.update')}}" method="post">  
        @csrf
      <div class="modal-body">
      
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
    <input type="text" class="form-control" name="category_name" id="e_category_name" >
    <input type="hidden" class="form-control" name="id" id="e_category_id">
    <div id="emailHelp" class="form-text"></div>This is your main category
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $('body').on('click','.edit', function(){
      let cat_id=$(this).data('id');
      $.get("category/edit/"+cat_id, function(data){
        $('#e_category_name').val(data.category_name);
        $('#e_category_id').val(data.id);
      });
    });
</script>
@endsection