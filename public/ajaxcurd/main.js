


function readData(){
		var getUrl = $("#showdata").val();

		$.get(getUrl, function(data){

			
				$('#student-info').empty().html(data);
				//console.log(data);
					
		    
		});

		// console.log(getUrl);

	}

	window.onload = readData();


	// creat data



			$("#StuSubmit").on('submit', function(e){
				e.preventDefault();
					var data = $(this).serialize();
				// var studentname = $("#studentname").val();	
				// var roll = $("#roll").val();	
				// var department = $("#department").val();

				var url = $(this).attr('action');
				var method = $(this).attr('method');

					//console.log(url+method);

					$.ajax({
							url : url,
							type : method,
							data : data,
							dataTy : 'json',
							success:function(result)
							{
								$('#student-info').empty().html(data);
								//$('#student-info').empty();

								  jQuery('.alert').show();

                    		     jQuery('.alert').html(result.success);
								  return readData();

								
								
							}
					})
				  
				  });



			//edit

			$('#editModal').on('show.bs.modal', function (event) {
			    var button = $(event.relatedTarget) 
	  	 	 	var studentid = button.data('studentid')
	  	 	 	var studentname = button.data('studentname')
	  	  		var roll = button.data('roll')
	  	  		var department = button.data('department')
			  
			     var modal = $(this)
			
			  modal.find('.modal-body #studentid').val(studentid);
			  modal.find('.modal-body #studentname').val(studentname);
			  modal.find('.modal-body #roll').val(roll);
			  modal.find('.modal-body #department').val(department);
			 })





 			$("#UpdateForm").on('submit', function(e){
				e.preventDefault();
					var data = $(this).serialize();

				var url = $(this).attr('action');
				var method = $(this).attr('method');

					//console.log(url+method);

					$.ajax({
							url : url,
							type : method,
							data : data,
							dataTy : 'json',
							success:function(mdata)
							{
								$('#student-info').empty().html(data);

								  jQuery('.alert').show();

                    		     jQuery('.alert').html(mdata.success);
								  return readData();

								
								
							}
					})
				  
				  });


 		
 			





  


