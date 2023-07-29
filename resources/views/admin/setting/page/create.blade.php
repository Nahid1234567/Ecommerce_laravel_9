@extends('layouts.admin')

@section('admin_content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home<a href="{{route('admin.home')}}"></a></li>
              <li class="breadcrumb-item active">Password Change</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Create a new page<h3>
                  <div class="card-body">
                   <form action="{{route('page.store')}}" method="POST">
                   @csrf
                   <div class="form-group">
                    <h5>Page Position</h5>
                    <select class="form-control" name="page_position">
                        <option value="1">Line One</option>
                        <option value="2">Line Two</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <h5>Page Name</h5>
                    <input type="text" class="form-control" name="page_name" id="exampleInputPassword1">
                  </div>

                  <div class="form-group">
                  <h5>Page Title</h5>
                    <input type="text" class="form-control" name="page_title" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <h5 >Page Description</h5>

                    <textarea class="form-control textarea" name="page_description" rows="4" >
                    
                    </textarea>
                   </div>          
                </div>
            </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary ml-9">Create Page</button>
                </div>
              </form>
                </div>
              </div>
             
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection