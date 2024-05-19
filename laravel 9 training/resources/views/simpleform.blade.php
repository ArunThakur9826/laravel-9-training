<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="with=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/a75af7b7d7.js" crossorigin="anonymous"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style>
    .span {
      color:  red;
    }
    .delete {
      color: red;
      font-size: 24px;
      padding-top: 25px;
    }
    .edit {
      font-size: 24px;
      padding-top: 25px;
      color: #1cb76ce6;
    }
    button {
      border: none;
    }
  </style>
</head>
  <body>


    <div class="container-fluid">
      <div class="row">
          <h1 class="text-center">Register Form</h1>
        <div class="col-sm-3">
            @if(session('success'))
            <div class='alert alert-success'>
            {{ session('success') }}
            </div>
          @endif
              <form method="post" enctype="multipart/form-data" action = "@isset($stud) {{url('/simpleform',$stud->id )}} @endisset">
                  @csrf
                  </pre>
                    <div class="form-group">
                      <label for="fname">First Name:</label>
                      <input type="text" name="fname" class="form-control" placeholder="Enter fname * "
                          value="@if(!empty($stud)){{ $stud->fname }} @else {{ old('fname') }} @endif">
                        <span class="span">
                          @error('fname')
                              {{$message}}
                          @enderror
                        </span>
                  </div><br>
                  <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" class="form-control" placeholder="Enter lname * " 
                         value=" @if(!empty($stud)){{ $stud->lname }} @else {{ old('lname') }}  @endif">
                      <span class="span">
                        @error('lname')
                          {{$message}}
                        @enderror
                      </span>
                  </div><br>
                  <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email *  "  
                       value="@if(!empty($stud)){{ $stud->email }} @else {{ old('email') }} @endif">
                    <span class="span">
                      @error('email')
                        {{$message}}
                      @enderror
                    </span>
                  </div><br>
          
                  <div class="form-group">
                    <label for="email">Mobile :</label>
                    <input type="phone" name="phone" class="form-control" placeholder="Enter mobile * " 
                      value=" @if(!empty($stud)){{ $stud->phone }} @else {{ old('phone') }} @endif">
                    <span class="span">
                      @error('phone')
                        {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label>Gender : </label> <br>
                      <input type="radio" name="gender" value="1"
                         @if(old('gender') == "1" || !empty($stud->gender) && $stud->gender == "1" ) checked @endif > Male
                      <input type="radio" name="gender" value="2" 
                         @if(old('gender') =="2" || !empty($stud->gender) && $stud->gender == "2") checked @endif> Female
                      <input type="radio" name="gender" value="3"
                         @if(old('gender') == "3" || !empty($stud->gender) && $stud->gender == "3" ) checked @endif> Others<br>
                      <span class="span">
                          @error('gender')
                            {{$message}}
                          @enderror
                      </span>
                  </div>

              
                  <div class="form-group">
                    <label for="qualification">Qualification :</label><br>
                      <input class="form-check-input" type="checkbox" name="qualification[]" value="1"
                          @if(is_array(old('qualification')))
                            @if(in_array("1",  old('qualification'))) checked  @endif
                          @endif
                             @isset($quali) @if(in_array("1", $quali)) checked @endif   @endisset
                       >
                        B. C. A.<br>

                      <input class="form-check-input" type="checkbox"  name="qualification[]" value="2"
                          @if(is_array(old('qualification')))
                            @if(in_array("2",  old('qualification'))) checked  @endif
                          @endif
                             @isset($quali) @if(in_array("2", $quali)) checked @endif   @endisset
                          >
                        B. S. C.<br>

                      <input class="form-check-input" type="checkbox"  name="qualification[]" value="3"
                        @if(is_array(old('qualification')))
                          @if(in_array("3",  old('qualification'))) checked  @endif
                        @endif
                          @isset($quali) @if(in_array("3", $quali)) checked @endif   @endisset
                        >
                        M. B. A<br>

                      <span class="span">
                          @error('qualification')
                            {{$message}}
                          @enderror
                        </span>
                  </div>


                  <div class="form-group">
                    <label for="country">Country : </label><br>
                      <select name="country" class="form-control" aria-label="Default select example">
                        <option value="" selected>Your Country</option>
                        <option value="india"
                           @if(old('country') == "india" || !empty($stud->country) && $stud->country == "india" ) selected @endif>India</option>
                        <option value="U.S.A." 
                        @if(old('country') == "U.S.A." || !empty($stud->country) && $stud->country == "U.S.A." ) selected @endif>U.S.A.</option>
                        <option value="Canada" 
                          @if(old('country') == "Canada" || !empty($stud->country) && $stud->country == "Canada" ) selected @endif>Canada</option>
                      </select>
                      <span class="span">
                        @error('country')
                          {{$message}}
                        @enderror
                      </span>
                  </div>
                  <div class="form-group">
                      <label for="fname">Upload Image : </label>
                      <input type="file" id="prev" name="image" class="form-control">
                      <span class="span"> @error('image') {{$message}}   @enderror</span><br>

                        @if(!empty($stud->image))
                          <img height="70" width="70" id="previmage" src="{{ URL::asset("thumbnail/".$stud->image) }}">
                       @else
                       <img height="70" width="70" id="previmage" src="" style="display: none">
                        @endif
                  </div>

            
                <button type="submit" name="submit" class="btn btn-info mt-2" style="width:100%">Submit</button>
              </form>
        </div>
        <div class="col-sm-9">
          @if(session('delete'))
            <div class='alert alert-success'>
            {{ session('delete') }}
            </div>
          @endif
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
                      <th colspan="3">Action</th>
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


                      <td><a href="{{ route('simpleform', $student->id) }}"><i class="fa-solid fa-pen-to-square edit"></i></a></td>

                      <td>
                        <form action="{{ url('simpleform',$student->id) }}" method="POST">
                          @csrf
                          @method('delete')
                          <button type="submit"><i class="fa-solid fa-trash-can delete"></i></button>
                        </form>
                      </td>

                    </tr>
                  @endforeach
                </tbody>
            </table>

        </div>
      </div>
    </div>




    <script>
      var imgInp = document.getElementById('prev');
      var previmage = document.getElementById('previmage');
      imgInp.addEventListener("change",function(){
        const [file] = imgInp.files
        if(file){
          previmage.style.display="block";
          previmage.src = URL.createObjectURL(file);
        }
    
      })

    </script>

  </body> 
</html>
