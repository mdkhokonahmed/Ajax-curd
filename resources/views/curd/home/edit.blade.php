
     <div class="modal fade" id="editModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
           <div class="modal-header">
          <h4 class="modal-title">Update Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

       <form action="{{url('Student/update')}}" method="POST" id="UpdateForm">
           @csrf
           <input type="hidden"  id="studentid" name="studentid" value="">
               
          <div class="form-group">
        <label for="studentname">Student Name</label>
        <input type="text" class="form-control" id="studentname" name="studentname">
      </div>

      <div class="form-group">
        <label for="roll">Roll</label>
        <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll">
      </div>

        <div class="form-group">
        <label for="department">Department</label>
        <input type="text" class="form-control" id="department" name="department" placeholder="department">
      </div>
      
  


        <button type="submit" class="btn btn-primary">Update</button>
        </form>
         
        </div>
        
      </div>
    </div>
  </div>