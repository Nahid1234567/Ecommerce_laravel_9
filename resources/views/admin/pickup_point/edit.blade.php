<form action="" method="POST" id="edit_form">  
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

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </form>  