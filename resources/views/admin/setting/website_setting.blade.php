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
                <h3 class="card-title">Your Website Setting<h3>
                <form action="{{route('website.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
                 @csrf
              <div class="card-body">
                <div class="form-group">

                  <h5>Currency</h5>
                      <select class="form-control" name="currency">
                        <option value="৳" {{( $setting->currency == "৳") ? 'selected': '' }}>Taka</option>
                        <option value="$" {{( $setting->currency == "$") ? 'selected': '' }}>USD</option>
                      </select>
                </div >
                 <div class="form-group"> 
                     <h5>Phone One</h5>
                     <input type="text" class="form-control" name="phone_one" value="{{$setting->phone_one}}" id="exampleInputPassword1" placeholder="Meta Author">
                  </div>
                     <div class="form-group"> 
                   <h5>Phone Two</h5>
                    <input type="text" class="form-control" name="phone_two" value="{{$setting->phone_two}}" id="exampleInputPassword1" placeholder="Meta Tag">
                  </div>
                  <div class="form-group"> 
                   <h5>Main Email</h5>
                    <input type="text" class="form-control" name="main_email" value="{{$setting->main_email}}" id="exampleInputPassword1" placeholder="Meta Description">
                  </div>             
                  <div class="form-group"> 
                   <h5>Support Mail</h5>
                    <input type="text" class="form-control" name="support_email" value="{{$setting->support_email}}" id="exampleInputPassword1" placeholder="Meta Keyword">
                  </div>
                  <div class="form-group"> 
                   <h5>Address</h5>
                    <input type="text" class="form-control" name="address" value="{{$setting->address}}" id="exampleInputPassword1" placeholder="Google Verification">
                  </div>
                  <strong class="text-info">Social Link</strong>
                  <div class="form-group"> 
                   <h5>Facebook</h5>
                    <input type="text" class="form-control" name="facebook" value="{{$setting->facebook}}" id="exampleInputPassword1" placeholder="Alexa Verification">
                  </div>
                  <div class="form-group"> 
                   <h5>Twitter</h5>
                    <input type="text" class="form-control" name="twitter" value="{{$setting->twitter}}" id="exampleInputPassword1" placeholder="Meta Title">
                  </div>
                  <div class="form-group"> 
                   <h5>Instagram</h5>
                    <input type="text" class="form-control" name="instagram" value="{{$setting->instagram}}" id="exampleInputPassword1" placeholder="Google Analytics">
                  </div>
                  <div class="form-group"> 
                   <h5>LinkedIn</h5>
                    <input type="text" class="form-control" name="linkedIn" value="{{$setting->instagram}}" id="exampleInputPassword1" placeholder="Google Analytics">
                  </div>
                  <div class="form-group"> 
                   <h5>Youtube</h5>
                    <input type="text" class="form-control" name="youtube" value="{{$setting->youtube}}" id="exampleInputPassword1" placeholder="Google Analytics">
                  </div>
                  <strong class="text-info">Logo & Favicon</strong>
                  <div class="form-group"> 
                      <h5>Main Logo</h5>
                        <input type="file" class="form-control" name="logo"> 
                        <input type="hidden" value="{{$setting->logo}}" name="old_logo">                    
                  </div>
                  <div class="form-group"> 
                      <h5>Favicon</h5>
                        <input type="file" class="form-control" name="favicon">         
                        <input type="hidden" value="{{$setting->favicon}}" name="old_favicon">               
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