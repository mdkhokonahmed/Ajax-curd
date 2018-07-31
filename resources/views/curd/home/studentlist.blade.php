@foreach($students as $value)
 <tr>
 	<td>{{$value->studentname}}</td>
 	<td>{{$value->roll}}</td>
 	<td>{{$value->department}}</td>
 	<td>
 			
		<!-- <button class="btn btn-warning btn-detail"  data-toggle="modal" data-target="#editModal" data-studentid="{{$value->studentid}}" data-studentname="{{$value->studentname}}" data-roll="{{$value->roll}}" data-department="{{$value->department}}">Edit</button> -->
		
		<a href="{{url('Studentedit/'.$value->studentid)}}" class="btn btn-warning btn-detail" id="edit" data-toggle="modal" data-target="#editModal" data-studentid="{{$value->studentid}}" data-studentname="{{$value->studentname}}" data-roll="{{$value->roll}}" data-department="{{$value->department}}">Edit</a>



		<button class="deleteProduct" data-id="{{ $value->studentid }}" data-token="{{ csrf_token() }}" >Delete Task</button>
 	</td>
 	
 </tr>
 @endforeach