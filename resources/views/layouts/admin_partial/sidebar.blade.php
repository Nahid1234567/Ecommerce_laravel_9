@php  
  $setting=DB::table('setting')->first();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="" alt="asas" width="20px" height="20px">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.home')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link">  
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategory.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('childcategory.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Child Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('brand.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Brand
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>   
          <li class="nav-item menu-open">
            
                <a href="#" class="nav-link">  
                <i class="nav-icon fas fa-th"></i>
                  <p>Product</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
              <ul class="nav nav-treeview">
          
              <li class="nav-item">
                <a href="{{route('product.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
              </ul>
            </li>
          <li class="nav-item">
            <a href="{{route('warehouse.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                 Warehouse
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>          

        
          <li class="nav-item">
                <a href="" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                  <p>Setting</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('seo.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seo Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('website.setting')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Setting </p>
                </a>
               </li>
                <li class="nav-item">
                <a href="{{route('page.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Page Setting</p>
                </a>
                 </li>
                 <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Page Management</p>
                </a>
                 </li>
                 <li class="nav-item">
                 <a href="{{route('smtp.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMTP Setting</p>
                </a>
                 </li>
                 <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment Gateway</p>
                </a>
                 </li>
              </li>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
              
              <a href="./index2.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
                <p>OFFER</p>
                <i class="right fas fa-angle-left"></i>
              </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('coupon.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupon</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{route('campaign.index')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>E Campaign</p>
              </a>
             </li>                  
          </ul>
        </li>
        <li class="nav-item menu-open">
              
              <a href="./index2.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
                <p>PickUp Point</p>
                <i class="right fas fa-angle-left"></i>
              </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('pickup_point.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PickUp Point</p>
                </a>
            </li>                           
          </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('ticket.index')}}" class="nav-link">
              <i class="fad fa-ticket-alt fa-lg"></i>
                    <p>Ticket</p>
            </a>
        </li>
       
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.blog.category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.blog.category') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
            </ul>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Contact Message
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.contact.message') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Message</p>
                </a>
              </li>   
            </ul>
          </li> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('report.order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer report</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock report </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product report </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ticket report </p>
                </a>
              </li> 
            </ul>
          </li>     
          
         <li class="nav-item menu-open">              
              <a href="./index2.html" class="nav-link">
              <i class="nav-icon far fa-user"></i>
                <p>User Role</p>
                <i class="right fas fa-angle-left"></i>
              </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{ route('create.role') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Role</p>
                </a>
             </li>           
            <li class="nav-item">
              <a href="{{ route('manage.role') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Role</p>
              </a>
             </li>                  
          </ul>
      
      
          <li class="nav-item">    
            <li class="nav-header">Profile</li>
            <li class="nav-item">
              <a href="{{route('admin.logout')}}" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Logout</p>
              </a>
            
          <li class="nav-item">
            <a href="{{route('admin.password.change')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Password Change</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('payment.gateway')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Payment Gateway</p>
            </a>
          </li>
      
  </aside>