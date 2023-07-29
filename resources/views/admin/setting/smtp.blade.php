seo.blade.php
@extends('layouts.admin')

@section('admin_content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h1 class="m-0">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}"></a></li>
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
                <h3 class="card-title">Your STMP Setting<h3>
                <form action="{{route('smtp.setting.update', $smtp->id)}}" method="POST">
                 @csrf
              <div class="card-body">
                <div class="form-group">

               <h5>Mail Mailer</h5>
                    <input type="text" class="form-control" name="mailer" value="{{$smtp->mailer}}" id="exampleInputPassword1" placeholder="Mail Mailer">
                </div >
                 <div class="form-group"> 
                   <h5>Mail Host</h5>
                    <input type="text" class="form-control" name="host" value="{{$smtp->host}}" id="exampleInputPassword1" placeholder="Mail Host">
                  </div>
                  <div class="form-group"> 
                   <h5>Mail Port</h5>
                    <input type="text" class="form-control" name="port" value="{{$smtp->port}}" id="exampleInputPassword1" placeholder="Mail Port">
                  </div>
                  <div class="form-group"> 
                   <h5>Mail Username</h5>
                    <input type="text" class="form-control" name="username" value="{{$smtp->username}}" id="exampleInputPassword1" placeholder="Mail Username">
                  </div>
                  <div class="form-group"> 
                   <h5>Mail Password</h5>
                    <input type="text" class="form-control" name="password" value="{{$smtp->password}}" id="exampleInputPassword1" placeholder="Mail Password">
                  </div>                            
                <!-- /.card-body -->

                <div>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
                </div>
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