

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>set-session</title>
</head>
<body>
	<center>
		<h1>using basic cookie</h1>
		<h3>{{ session('msg') }}</h3>
     <form method="post">
     	@csrf
     	<input type="text" name="email" placeholder="Enter email..."><br /><br />
     	<input type="password" name="password" placeholder="Enter email..."><br /><br />
       
     	<input type="submit" value="submit">

     </form>
     <a href="{{ route('getcookie') }}">view cookie</a>
	</center>
</body>
</html>