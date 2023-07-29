@extends('layouts.admin')

@section('admin_content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-3">Brands</h1>
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
                        <h3 class="card-title">All Brands List here</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>SL</th>
                      <th>Brand Name</th>
                      <th>Brand Slug</th>
                      <th>Brand Logo</th>
                      <th>Home Page</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=>$row)
                          <tr>                              
                                  <td>{{$key+1}}</td>
                                  <td>{{$row->brand_name}}</td>
                                  <td>{{$row->brand_slug}}</td>
                                  <td>
                                    <img src="{{asset('/'. $row->brand_logo)}}" alt="asas" width="20px" height="20px">
                                  </td>
                                  <td>
                                    @if($row->front_page==1)
                                      <span class="badge badge-success">Home Page</span>
                                    @endif   
                                  </td>
                                  <td>
                                  <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i></a>
                                      <a href="{{route('page.delete', $row->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                  <td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
         <div class="modal-body">

      </div>
    </div>
  </div>
</div>                 

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data" id="add-form">  
        @csrf
      
  <div class="modal-body">   
  <div class="mb-3">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control" name="brand_name" id="brand_name" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Brand Logo</label>
    <input type="file" name="brand_logo" data-height="140" id="input-file-now">
    
  </div>

  <div class="form-group">
            <label for="brand-name">Home Page Show</label>
            <select class="form-control" name="front_page">
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page </small>
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

  <script>
    $('body').on('click','.edit', function(){
        let b_id=$(this).data('id');
        $.get("brand/edit/"+b_id, function(data){
          console.log(data);
              
        });
    });
  </script>

@endsection