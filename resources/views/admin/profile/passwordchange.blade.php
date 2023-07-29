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
                <h3 class="card-title">Change Your Password<h3>
                  <div class="card-body">
                   <form action="{{route('admin.password.update')}}" method="POST">
                   @csrf
                  <div class="form-group">
                    <h5>Old Password</h5>
                    <input type="password" class="form-control" name="old_password" id="exampleInputPassword1" placeholder="Old Password">
                  </div>
                  <div class="form-group">
                  <h5>New Password</h5>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password">
                    @if(session('error'))
                                    <strong style ="color:red;">
                                    {{session('error')}}
                                    </strong>
                                    @endif
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                  </div>
                  <div class="form-group">
                  <h5>Confirm Password</h5>
                    <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword1" placeholder="Confirm Password">
                  </div>
                 
                  
                </div>
</div>
</div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary ml-9">Update</button>
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