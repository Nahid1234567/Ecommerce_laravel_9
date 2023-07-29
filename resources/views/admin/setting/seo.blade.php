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
                <h3 class="card-title">Your Seo Setting<h3>
                <form action="{{route('seo.setting.update', $data->id)}}" method="POST">
                 @csrf
              <div class="card-body">
                <div class="form-group">

                <h5>Meta Title</h5>
                    <input type="text" class="form-control" name="meta_title" value="{{$data->meta_title}}" id="exampleInputPassword1" placeholder="Meta Title">
                </div >
                 <div class="form-group"> 
                   <h5>Meta Author</h5>
                    <input type="text" class="form-control" name="meta_author" value="{{$data->meta_author}}" id="exampleInputPassword1" placeholder="Meta Author">
                  </div>
                  <div class="form-group"> 
                   <h5>Meta Tag</h5>
                    <input type="text" class="form-control" name="meta_tag" value="{{$data->meta_tag}}" id="exampleInputPassword1" placeholder="Meta Tag">
                  </div>
                  <div class="form-group"> 
                   <h5>Meta Description</h5>
                    <input type="text" class="form-control" name="meta_description" value="{{$data->meta_description}}" id="exampleInputPassword1" placeholder="Meta Description">
                  </div>
                  <strong class="text-center text-success">---Others---<strong><br>
                  <div class="form-group"> 
                   <h5>Meta Keyword</h5>
                    <input type="text" class="form-control" name="meta_keyword" value="{{$data->meta_keyword}}" id="exampleInputPassword1" placeholder="Meta Keyword">
                  </div>
                  <div class="form-group"> 
                   <h5>Google Verification</h5>
                    <input type="text" class="form-control" name="google_verification" value="{{$data->google_verification}}" id="exampleInputPassword1" placeholder="Google Verification">
                  </div>
                  <div class="form-group"> 
                   <h5>Alexa Verification</h5>
                    <input type="text" class="form-control" name="alexa_verification" value="{{$data->alexa_verification}}" id="exampleInputPassword1" placeholder="Alexa Verification">
                  </div>
                  <div class="form-group"> 
                   <h5>Google Adscene</h5>
                    <input type="text" class="form-control" name="google_adscene" value="{{$data->google_adscene}}" id="exampleInputPassword1" placeholder="Meta Title">
                  </div>
                  <div class="form-group"> 
                   <h5>Google Analytics</h5>
                    <input type="text" class="form-control" name="google_analytics" value="{{$data->google_analytics}}" id="exampleInputPassword1" placeholder="Google Analytics">
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