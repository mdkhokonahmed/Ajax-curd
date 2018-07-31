@extends('curd.master')

@section('content')




<div class="container">
 

<a href="{{url('total-list')}}">Total List</a>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
           <div class="modal-header">
          <h4 class="modal-title">New Student</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

       <form action="{{url('student/store')}}" method="POST" id="StuSubmit">
           @csrf
  		@include('curd.home.form')

        <button type="submit" class="btn btn-primary">Save</button>
        </form>
         
        </div>
        
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Student
  </button>

<input type="hidden" id="showdata" value="{{url('student/read-data')}}">
  <div class="alert">
      
    </div>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
       
        <th>Student Name</th>
        <th>Roll</th>
        <th>Department</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="student-info">
    
    </tbody>
  </table>

 
    
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
         @include('curd.home.form')

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
         
        </div>
        
      </div>
    </div>
  </div>

</div>
@endsection

@section('javascript')

<!-- <script type="text/javascript">
 
     function del(studentid){
        $.ajax({
          type: "POST",
          url: '{{url("deletestudent")}}',
          data:{studentid:studentid},
           dataType : 'json',
          success: function(response){
              console.log(response);
          }
        })
      }
</script> -->

<!--   <script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#student-info tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>  -->
<!-- 
<script type="text/javascript">
  function search(){
    var search = $("#search").val();
    $.ajax({
      type:"POST",
      url:'{{URL::to("/search")}}',
      data:{
          search: search,
          _token: $('#khokon').val()

      },
      dataType:'html'.
      success: function(response){
        console.log(response);
        $("student-info").html(response);
      }
    })
  }
</script> -->





@endsection


