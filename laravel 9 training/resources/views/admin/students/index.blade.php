


@extends('layouts.adminapp')

@section('admin-content')

<div class="container mt-5">
	<div class="row">
		  <div class="col-sm-2 d-flex align-items-end flex-column pl-5">   
	     <h3 class="text-red">Filter Data</h3>
        <b>Country Filter Data</b>
		      <ul class="bg-info"> 
	          <li class="nav-item menu-open list-unstyled">
	            <ul class="nav nav-treeview" id="countryoption">

	            </ul>
	          </li>
	        </ul> 
        <b>Qualification Filter Data</b>
          <ul class="bg-info"> 
            <li class="nav-item menu-open list-unstyled">
              <ul class="nav nav-treeview" id="countryoptions">
                <li class="nav-item">
                  <label for="usa">B.C.A.</label>
                  <input type="checkbox" value="1" id="id_bca">
                </li>
                <li class="nav-item">
                  <label for="usa">B.S.C.</label>
                  <input type="checkbox" value="2" id="id_bsc">
                </li>
                <li class="nav-item">
                  <label for="usa">M.B.A.</label>
                  <input type="checkbox" value="3" id="id_mba">
                </li>
              </ul>
            </li>
          </ul>
        <b>Gender Filter Data</b>
          <ul class="bg-info"> 
            <li class="nav-item menu-open list-unstyled">
              <ul class="nav nav-treeview" id="countryoptions">
                <li class="nav-item">
                  <label for="usa">Male</label>
                  <input type="checkbox" value="1" id="id_male">
                </li>
                <li class="nav-item">
                  <label for="usa">Female</label>
                  <input type="checkbox" value="2" id="id_female">
                </li>
                <li class="nav-item">
                  <label for="usa">Other</label>
                  <input type="checkbox" value="3" id="id_other">
                </li>
              </ul>
            </li>
          </ul>
      </div>

        <div class="col-sm-10 d-flex align-items-end flex-column pl-5">
            <table class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                    <tr class="text-center w-100">
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
                <tbody id="tbody">

                   @php $i =1 @endphp
                  @foreach($students as $student)

                    <tr class="text-center">
                      <td>{{ $i++ }}</td>
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
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  // dyanamic country data
    $(document).ready(function (){

        $.ajax({
          url: "{{ url('admin/getOption') }}",
          success: function(data){
          	 $.each(data, function(index, item){
          	   if(item.usa != 0 && index == 0){
          	   	$('#countryoption').append(`
          	   	  <li class="nav-item">
	                  <label for="usa">U.S.A.</label>
	                  <input type="checkbox" value="U.S.A." id="id_usa">
	              </li>
          	   	`);
          	   }  
           	   if(item.india != 0 && index == 1){
          	   	$('#countryoption').append(`
          	   	  <li class="nav-item">
	                  <label for="india">India</label>
	                  <input type="checkbox" value="india" id="id_india">
	              </li>
          	   	`);
          	   }  
          	   if(item.canada != 0 && index == 2){
          	   	$('#countryoption').append(`
          	   	  <li class="nav-item">
	                  <label for="canada">Canada</label>
	                  <input  type="checkbox" value="Canada" id="id_canada">
	              </li>
          	   	`);
          	   }	
          	 });
          }
        });
      // End dyanamic country data


 // get country checkbox value data
       var array_input = [];
       var array_quali = [];
       var array_gender = [];

       $(document).on('change','#id_usa',function(){
       	if( $(this).is(':checked') ){
       		array_input.push($(this).val());
       	}else{
       		array_input.splice( $.inArray($(this).val(),array_input) ,1 );
       	}

       	function_filter(array_input,array_quali,array_gender);
       });

       $(document).on('change','#id_india',function(){
       	if( $(this).is(':checked') ){
       		array_input.push($(this).val());
       	}else{
       		array_input.splice( $.inArray($(this).val(),array_input) ,1 );
       	}
       	function_filter(array_input,array_quali,array_gender);
       });

       $(document).on('change','#id_canada',function(){
       	if( $(this).is(':checked') ){
       		array_input.push($(this).val());
       	}else{
       		array_input.splice( $.inArray($(this).val(),array_input) ,1 );
       	}
       	function_filter(array_input,array_quali,array_gender);
       });
       // end get country checkbox value data


   // start get male checkbox value data
       $(document).on('change','#id_male',function(){
        if( $(this).is(':checked') ){
          array_gender.push($(this).val());
        }else{
          array_gender.splice( $.inArray($(this).val(),array_gender) ,1 );
        }

        function_filter(array_input,array_quali,array_gender);
       });

       $(document).on('change','#id_female',function(){
        if( $(this).is(':checked') ){
          array_gender.push($(this).val());
        }else{
          array_gender.splice( $.inArray($(this).val(),array_gender) ,1 );
        }
        function_filter(array_input,array_quali,array_gender);
       });

       $(document).on('change','#id_other',function(){
        if( $(this).is(':checked') ){
          array_gender.push($(this).val());
        }else{
          array_gender.splice( $.inArray($(this).val(),array_gender) ,1 );
        }
        function_filter(array_input,array_quali,array_gender);
       });
   // end get male checkbox value data





    // get qualification checkbox value data
         $(document).on('change','#id_bca',function(){
          if( $(this).is(':checked') ){
            array_quali.push($(this).val());
          }else{
            array_quali.splice( $.inArray($(this).val(),array_quali) ,1 );
          }
          function_filter(array_input,array_quali,array_gender);
         });
         $(document).on('change','#id_bsc',function(){
          if( $(this).is(':checked') ){
            array_quali.push($(this).val());
          }else{
            array_quali.splice( $.inArray($(this).val(),array_quali) ,1 );
          }
          function_filter(array_input,array_quali,array_gender);
         });
         $(document).on('change','#id_mba',function(){
          if( $(this).is(':checked') ){
            array_quali.push($(this).val());
          }else{
            array_quali.splice( $.inArray($(this).val(),array_quali) ,1 );
          }
          function_filter(array_input,array_quali,array_gender);
         });
    // end get qualification checkbox value data


	    function function_filter(array_input,array_quali,array_gender){
       console.log(array_gender);
	        $.ajax({
	           url: "{{ url('admin/getOptiondata') }}",
	       		type: 'get',  
	            data: {country : array_input, quali: array_quali, gender: array_gender},
	           success: function(data){
              console.log(data);
            	$("#tbody").html(' ');
            	  $.each(data, function(index, item){
                      var qualification = "";
                      var gender = "";
                       if(data[index].gender == "1"){
                          gender = "Male";
                       }else  if(data[index].gender == "2"){
                          gender = "Female";
                       }else{
                        gender = "Other";
                       }

                        if( data[index].qualification == "1"){
                         qualification = "B. C. A";
                        }
                        else if(data[index].qualification == "2"){
                         qualification = "B. S. C";
                        }
                        else if(data[index].qualification == "3"){
                         qualification = "M. B. A";
                        }
                        else if(data[index].qualification == "1,2"){
                         qualification = "B. C. A, B. S. C";
                        }
                        else if(data[index].qualification == "1,2,3"){
                         qualification = "B.C. A, B. S. C,  M. B. A";
                        }
                        else if(data[index].qualification == "1,3"){
                         qualification = "B. C. A, M. B. A";
                        }
                        else if(data[index].qualification == "2,3"){
                         qualification = "B. S. C,  M. B. A";
                        }
                        
	                 $("#tbody").append(`
	                 	<tr class="text-center">
	                      <td>${ index + 1 }</td>
	                      <td>${ data[index].fname }</td>
	                      <td>${ data[index].lname }</td>
	                      <td>${ data[index].email }</td>
	                      <td>${ data[index].phone }</td>
	                      <td>${ gender }</td>
	                      <td>${ qualification }</td>
	                      <td>${ data[index].country }</td>
	                      <td><img src="{{URL::asset('thumbnail') }}/${ data[index].image }"></td>
	                    </tr>`);
	            	 });
               }
	           
	        }); 
        }


    });

</script>
@endsection


