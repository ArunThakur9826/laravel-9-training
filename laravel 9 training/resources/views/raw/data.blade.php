<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>
<body>


   


<div class="container">
    <div class="col-sm-9">
          <table class="table table-bordered table-striped table-hover table-responsive">
              <thead>
                  <tr class="text-center">
                    <th>Id</th>
                    <th>Fname</th>
                    <th>Lname</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Gender</th>
                    <th>Qualification</th>
                    <th>Country</th>
                    <th>Image</th>
                    
                  </tr>
              </thead>
              <tbody>

                 
                @foreach($students as $student)

                  <tr class="text-center">
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->fname }}</td>
                    <td>{{ $student->lname }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                      @if(  $student->gender== "1")
                        Male
                      @elseif(  $student->gender== "2")
                        Femail
                      @elseif(  $student->gender== "3")
                        Others
                      @endif
                    </td>
                    <td>
                      @if( $student->qualification == "1")
                        B. C. A
                      @elseif($student->qualification == "2")
                        B. S. C
                      @elseif($student->qualification == "3")
                        M. B. A
                      @elseif($student->qualification == "1,2")
                        B. C. A, B. S. C
                      @elseif($student->qualification == "1,2,3")
                        B. C. A, B. S. C,  M. B. A
                      @elseif($student->qualification == "1,3")
                        B. C. A, M. B. A
                      @elseif($student->qualification == "2,3")
                        B. S. C,  M. B. A
                      @endif
                    </td>
                    <td>{{ $student->country }}</td>
                    <td><img src="{{URL::asset("thumbnail/".$student->image) }}"></td>
                    <td><a href="{{ route('rawid',$student->id) }}">byid</a></td>
                  </tr>

                @endforeach
                <ul>
                    <a href="{{ route('raw') }}">show</a>
                    
                    <a href="{{ route('rawdsc') }}">dsc</a>
                    <a href="{{ route('rawlimit') }}">limit</a>
                  </ul>
              </tbody>
          </table>

    </div>
</div>
</body>
</html>