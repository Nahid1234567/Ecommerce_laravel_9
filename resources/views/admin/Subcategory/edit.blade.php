<form action="{{route('subcategory.update')}}" method="post" id="add-form">  
        @csrf
    <div class="modal-body">
                          
      <div class="form-group">
        <label for="exampleInputEmail1" class="form-label">Sub Category Name</label>
        <select class="form-control" name="category_id">
          @foreach($category as $row)      
            <option value="{{$row->id}}"> {{$row->category_name}}
            <option>
          @endforeach
        <select>
      </div>
        <input type="hidden" name="id" value="{{$data->id}}">  
        <div class="form-group">
          <label for="exampleInputEmail1" class="form-label">Sub Category Name</label>
          <input type="text" name="subcategory_name" class="form-control" id="exampleInputEmail1" value="{{$data->subcategory_name}}" required>
          <div id="emailHelp" class="form-text"></div>This is your main category
        </div>
        
      
    </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Update</button> 
      </div>         
</form>  