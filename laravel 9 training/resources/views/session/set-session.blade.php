

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>set-session</title>
</head>
<body>
	<center>
		<h1>using basic session</h1>
     <form action="{{ url('set-session') }}">
     	@csrf
     	<input type="text" name="email" placeholder="Enter email..."><br /><br />
     	<input type="password" name="password" placeholder="Enter email..."><br /><br />
     	<input type="submit" value="submit">
     </form>
	</center>
</body>
</html>