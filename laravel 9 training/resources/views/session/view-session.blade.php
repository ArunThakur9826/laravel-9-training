<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>set-session</title>
</head>
<body>
	<center>
		<h1>View session</h1>
		<h3>{{ session('status') }}</h3>
		<p><b>Email : </b>{{ session('email') }}</p>
		<p><b>Password : </b>{{ session('password') }}</p>

		<a href="{{ route('destroy') }}">Destroy</a>
      

	</center>
</body>
</html>