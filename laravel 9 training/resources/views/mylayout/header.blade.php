
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ URL::asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
@stack('title')
<style>
  .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="text-white nav-link" href="{{ route('myhome') }}">home</a>
      </li>
      <li class="nav-item">
        <a class="text-white  nav-link" href="{{ route('myabout') }}">about</a>
      </li>

    </ul>
  </div>
</nav>



	<center><div class="container">
	    @yield('main-section')
	</div></center>

@include('mylayout.footer')
</body>
</html>
