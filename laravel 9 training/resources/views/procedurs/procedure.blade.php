<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<title></title>
</head>
<body>



<div class="container mt-5">
    
<table class="table table-bordered table-striped table-hover table-responsive">
    <h2>has many Relation Group By data</h2>
	<thead>
	    <tr class="text-center">
	      <th>Id</th>
	      <th>name</th>
	      <th>google2fa_secret</th>
	      <th>google_id</th>	      
	      <th>oauth_id</th>
	      <th>oauth_type</th>
	      <th>email_verified_at</th>
	      <th>email_verified_at</th>	     
	    </tr>
	</thead>
	<tbody>
     @foreach( $getPost as $data)
       <tr class="text-center">
          <td>{{ $data->id }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->google2fa_secret }}</td>
          <td>{{ $data->google_id }}</td>
          <td>{{ $data->oauth_id }}</td>
          <td>{{ $data->oauth_type }}</td>
          <td>{{ $data->email_verified_at }}</td>
          <td>{{ $data->email_verified_at }}</td>

        </tr>
      @endforeach
   </tbody>
</table>

</body>
</html>