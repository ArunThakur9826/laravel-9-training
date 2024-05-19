 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://kit.fontawesome.com/a75af7b7d7.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	    <!-- Google Font: Source Sans Pro -->
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	    
	    <!-- Font Awesome Icons -->
	    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
	    <!-- Theme style -->
	    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">  
    

        <style>
        .sidebar {
            height: 100% !important;
        }
         aside{
         	height: 100vh !important;
         }


        i.fa-solid.fa-pen-to-square.edit {
            color: #219ccd;
            font-size: 24px;
        }
        i.fa-solid.fa-trash-can.delete {
            color: red;
            font-size: 24px;
        }
        .span{
            color: red;
        }
        </style>

     </head>


		<body class="hold-transition sidebar-mini">
		   <div class="wrapper">                                                                

              @include('layouts.header')

              @include('layouts.sidebar')

                @yield('admin-content')

              @include('layouts.footer')

	       </div>
	    </body>                                                                                                                                                                                       
</html>
