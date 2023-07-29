
<form action="{{route('childcategory.update')}}" method="post">  
        @csrf
        
     <div class="modal-body">
      <div class="form-group">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Category/SubCategory</label>
          <select class="form-control" name="subcategory_id" required>
            @foreach($category as $row)   
              @php
                $subcat=DB::table('subcategories')->where('category_id',$row->id)->get();
              @endphp  
                <option disabled style="color:blue;">{{$row->category_name}}</option>
                    @foreach($subcat as $row) 
                <option value="{{$row->id}}" @if($row->id == $data->subcategory_id) selected @endif> {{$row->subcategory_name}}</option>
                    @endforeach                
               @endforeach
          <select>
          <div id="emailHelp" class="form-text"></div>This is subcategory
        </div>
        <input type="hidden" name="id" value="{{$data->id}}">
      </div>
    <div class="form-group">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ChildCategory Name</label>
     
      <div id="emailHelp" class="form-text"></div>This is your main category
  </div>
</div>


 
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Update</button>     
      </div>
    </div>  
</form> 