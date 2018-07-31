function readData(){
		var getUrl = $("#showdata").val();
		$.get(getUrl, function(data){

			
				$('#student-info').empty().html(data);
				//console.log(data);
					
		    
		});

		// console.log(getUrl);

	}

	window.onload = readData();