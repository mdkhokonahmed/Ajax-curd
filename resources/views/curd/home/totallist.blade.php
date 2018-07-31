@extends('curd.master')

@section('content')

<div class="container">
      
    <div class="container mt-3">
    
    	<input class="form-control" id="livesearch" type="text"  name="livesearch" placeholder="Search">
    
    <br>
  </div>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
           <div class="modal-header">
          <h4 class="modal-title">New Category</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <form>
           @csrf
            
           <div class="form-group">
            <label for="student">Student Name</label>
              <select  name="student" id="student" class="form-control">
                <option value="">Place Student</option>
                  
                     @foreach($students as $key => $value)
                    <option value="{{$value->studentid}}">{{$value->studentname}}</option>
                    @endforeach

              </select>
          </div>
          
          <div class="form-group">
            <label for="studentname">Department</label>
            <select  name="department" id="department" class="form-control">
                  <option value=""></option>
            </select>
          </div>
              </form>
         
        </div>
        
      </div>
    </div>
  </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Category
  </button>



  <table class="table table-striped">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Roll</th>
        <th>Department</th>
      </tr>
    </thead>
    <tbody id="live_search">
    	@foreach($listdata as $data)
      <tr>
        <td>{{$data->studentname}}</td>
        <td>{{$data->roll}}</td>
        <td>{{$data->department}}</td>
        
      </tr>

      @endforeach
     
      
    </tbody>
  </table>

</div>



@endsection

@section('javascript')

<script type="text/javascript">
     $(document).ready(function(){
          $("#livesearch").on('keyup', function(){
             livesearch = $(this).val();
             $.ajax({
                     type: 'get',
                     url: '{{ URL::to("livesearch") }}',
                     data: {'livesearch': livesearch},
                     success: function(data){
                        $("#live_search").html(data);
                     }

              });
          });
     })




</script>



 <script>
        $('#student').on('change', function () {
            getProducts($(this).val());
        });
        function getProducts(studentid) {
            $.get("{{url('/ajax-subcategory')}}/" + studentid, function (data) {
                $("#department").html(data);
            });
        }
        $(document).ready(function () {
            getProducts($('#student').val());
        });
    </script>

@endsection