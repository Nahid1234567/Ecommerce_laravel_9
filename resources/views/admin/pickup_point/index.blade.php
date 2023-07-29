@extends('layouts.admin')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-3">Coupon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class ="breadcrumb float-sm-right">
              <button class="btn btn-primary m-4" data-toggle="modal" data-target="#addModal">+ Add New PickUp Point</button>
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
                        <h3 class="card-title">PickUp Point List here</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                  </div>
                  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover ytable">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>PickUp Point</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Another Phone</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>

                </table>   
                   <form id="delete_form"  action="" method="post">
                    @method('DELETE')    
                    @csrf
                   </form>     
              </div>
           </div>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit PickUp Point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('pickup_point.update')}}" method="POST" id="edit_form">  
        @csrf
      <div class="modal-body"> 
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">PickUp Point Name</label>
      
        <input type="text" class="form-control" name="pickup_point_name" id="e_pickup_point_name" aria-describedby="emailHelp">
        <input type="hidden" class="form-control" name="id" id="e_pickup_point_id">
        <div id="emailHelp" class="form-text"></div>
        </div>
      
        <div class="form-group">
          <label for="coupon-code" class="form-label">Address</label>
          <input type="text" class="form-control" name="pickup_point_address" id="e_pickup_point_address" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text"></div>
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="text" class="form-control" name="pickup_point_phone" id="e_pickup_point_phone" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Another Phone</label>
            <input type="text" class="form-control" name="pickup_point_phone_two" id="e_pickup_point_phone_two" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>

   <button type="submit" class="btn btn-primary"><span class="loading d-none">Loading...</span>Submit</button>

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </form>  

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PickUp Point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{route('pickup_point.store')}}" method="POST" id="add_form">  
        @csrf
      <div class="modal-body"> 
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">PickUp Point Name</label>
        <input type="text" class="form-control" name="pickup_point_name" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
        </div>
      
        <div class="form-group">
          <label for="coupon-code" class="form-label">Address</label>
          <input type="text" class="form-control" name="pickup_point_address" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text"></div>
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="text" class="form-control" name="pickup_point_phone" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Another Phone</label>
            <input type="text" class="form-control" name="pickup_point_phone_two" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>

   <button type="submit" class="btn btn-primary"><span class="loading d-none">Loading...</span>Submit</button>
   <div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </form>  
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
    $(function childcategory(){
        var table=$('.ytable').DataTable({
            processing : true,
            serverSide: true,          
            ajax:"{{route('pickup_point.index')}}",
            columns:[
                {data:'DT_RowIndex', name:'DT_RowIndex'},
                {data:'pickup_point_name', name:'pickup_point_name'},
                {data:'pickup_point_address', name:'pickup_point_address'},
                {data:'pickup_point_phone', name:'pickup_point_phone'},
                {data:'pickup_point_phone_two', name:'pickup_point_phone_two'},
                {data:'action', name:'action', orderable:true, searchable:true},                
            ]
        });
        
    });
    $('#add_form').submit(function(e){
        e.preventDefault();
        $('.loading').removeClass('d-none');
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url:url,
            type:'post',
            async:'false',
            data:request,
            success:function(data){               
                $('#add_form')[0].reset();
                $('.loading').addClass('d-none');
                $('#addModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
    $('#edit_form').submit(function(e){
        e.preventDefault();
        $('.loading').removeClass('d-none');
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url:url,
            type:'post',
            async:'false',
            data:request,
            success:function(data){               
                $('#edit_form')[0].reset();
                $('.loading').addClass('d-none');
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
    $('#delete_form').submit(function(e){
        e.preventDefault();
        $('.loading').removeClass('d-none');
        var url = $(this).attr('action');
        var request = $(this).serialize();
        $.ajax({
            url:url,
            type:'post',
            async:'false',
            data:request,
            success:function(data){               
                $('#delete_form')[0].reset();
                $('.loading').addClass('d-none');
                $('#addModal').modal('hide');
                table.ajax.reload();
            }
        });
    });

    $('body').on('click','.edit', function(){
      let id=$(this).data('id');
      $.get("pickup_point/edit/"+id, function(data){
        $('#e_pickup_point_name').val(data.pickup_point_name);
        $('#e_pickup_point_id').val(data.id);
        $('#e_pickup_point_address').val(data.pickup_point_address);
        $('#e_pickup_point_phone').val(data.pickup_point_phone);
        $('#e_pickup_point_phone_two').val(data.pickup_point_phone_two);
      });
    });
 
   
</script>



@endsection