<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<title>apidata</title>
</head>
<body>
  

    <div class="container mt-5">
        <div class="col-sm-12 m-auto">
        	<h1>Api Data</h1>
            <table class="table-bordered" id="load_table">
                <thead>
                  <tr class="text-center">
                    <th>Id</th>
                    <th>name</th>
                    <th>email</th>

                  <tr>
                </thead>

  
                <tbody id="tbody"> 
                 
     
          
                </tbody>

             
          </table>
        </div>
    </div>

   
   <script>

   $.ajax({
      url: "{{ url('/api/demoapi') }}",

      success: function (data) {
      	

      	$.each(data, function (index, item){
      		$('#tbody').append(`<tr>
                <td class="p-2">${data[index].id}</td>
                <td class="p-2">${data[index].name}</td>
                <td class="p-2">${data[index].email}</td>
              
      			</tr>
      		`)
      	})
      }

   });


   </script>
</body>
</html>

