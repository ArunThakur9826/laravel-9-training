<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>basic laravel</title>
    </head>

    <body>

{{--====== <h1>basic laravel demo</h1> =====--}}
    <center><h1>basic laravel demo</h1>

         {{ $name  ?? 'name field' }} <!-- optinol value --->
         {!! $html !!}      <!-- decode html   --->






{{--=======  <h1>if elseif else statement laeravel</h1> =======--}}
     <h1>if elseif else statement laeravel</h1>
        @if ($name == "")
            {{"Name is empty"}}

        @elseif ($name == "arun")
            {{"Name is correct"}}
        @else
            {{"Name is incorrect"}}
        @endif




{{--=======  <h1>unless statement laeravel</h1> =======--}}
     <h1>unless statement laeravel</h1>
        @unless ($name == "arun")
           {{ "name is correct" }}
        @endunless



{{--======= <h1>isset statement laeravel</h1> =======--}}
    <h1>isset statement laeravel</h1>
       Isset =>
        @isset ($name)
           {{$name}}
        @endisset
        



{{--======= <h1>for loop laeravel</h1> =======--}}
    <h1>for loop laeravel</h1>
        @for ($i=1; $i<=10; $i++)
           {{$i}}
        @endfor

   

{{--=======  <h1> While loop laeravel</h1> =======--}}
       <h1> While loop laeravel</h1>

        @php
           $x = 1;
        @endphp
            @while ($x<=8)
               {{$x}}
               @php $x++; @endphp 
            @endwhile
 
        
  {{--==========  <h1> While loop laeravel</h1> ============--}}
    <h1> While loop laeravel</h1>
    <?php
       $country = ['india','canada','u.s.a','america','rasia','jpan','cheen'];
    ?>
        <select>
            @foreach ($country as $key => $countries)
               <option value="{{$key}}">{{$countries}}</option>
            @endforeach
        </select>




 {{--==========  <<h1>continue and breake statement</h1> ============--}}
    <h1>continue and breake statement</h1>
            @for ($z=1; $z<=10; $z++)
               @if($z == 5)
               {{ "continue" }}
                  @continue

               @endif  
                {{ $z }}
            @endfor

              <br><br>
            @for ($i=1; $i<=10; $i++)
               @if($i==6)
                  {{"break"}}
                  @break;
                  
               @endif
               {{ $i }}
            @endfor





    </body>
</html>