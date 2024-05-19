<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">

	<title>basic-view</title>
</head>
<body>
  <h1>Add asset and  Passing data into a view</h1>
   <table border="1">
     	<tr>
	   	  <th>Id</th>
	   	  <th>fname</th>
	   	  <th>lname</th>
	   	  <th>email</th>
	   	  <th>phone</th>
   	   <tr>
   	   	@foreach( $studata as $value)
     	<tr>
	   	  <td>{{ $value->id }}</td>
	   	  <td>{{ $value->fname }}</td>
	   	  <td>{{ $value->lname }}</td>
	   	  <td>{{ $value->email }}</td>
	   	  <td>{{ $value->phone }}</td>
   	    <tr>
        @endforeach
   </table>
<script type="text/javascript" src="{{ URL::asset('assets/js/customjs.js') }}"></script>
</body>
</html>