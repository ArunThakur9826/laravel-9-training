
@extends('layouts.adminapp')

@section('admin-content')

<div class="container mt-4">
	<div class="row">
    <div class="col-sm-12  pl-5 d-flex align-items-center flex-column">



      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
              </div>
              <div class="modal-body">
                   <div class="errors">
                     <ul id="ul">
                     </ul>
                   </div>
                  <form method="post" id="storedata" enctype="multipart/form-data" action = "{{ url('admin/store')}}">
                      @csrf
                      <label for="fname">Name:</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter name * "
                          value="">
                            @error('name')
                              <span id="name" class="span">{{$message}}</span>
                            @enderror
                      <br><label for="email">Email:</label>
                      <input type="text" name="email" class="form-control" placeholder="Enter Email * "
                          value="">
                        <span class="span" id="email">
                          @error('email')
                             <span class="span"> {{$message}}</span>
                          @enderror
                        </span>

                        <label for="password">Password</label>
                         <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                          <span class="span" id="password">
                            @error('password')
                               <span class="span"> {{$message}}</span>
                            @enderror
                        </span>
                        <label for="password">Confirm Password</label>
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          <span class="span" id="password">
                            @error('password_confirmation')
                               <span class="span"> {{$message}}</span>
                            @enderror
                        </span>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" id="closebtn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    <!-- End Modal -->
            <div id="alert" class='alert alert-success w-50 mt-4' style="display: none;">
            </div>
          @if(session('success'))
            <div class='alert alert-success w-50 mt-4'>
            {{ session('success') }}
            </div>
          @endif

            <table class="table table-bordered table-striped table-hover table-responsive w-auto ms-5" style="">
                <thead>
                    <tr class="text-center">
                      <th>Id</th>
                      <th>name</th>
                      <th>Email</th>
                      {{-- <th>Role</th> --}}
                      <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">   
                  @php
                    $i = 0
                  @endphp              
                  @foreach($users as $user)
                    @php $i++ @endphp
                    <tr class="text-center">
                      <td>{{ $i }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      {{-- <td>{{ $user->usertype }}</td> --}}
                      	<td><a href="{{ route('admin.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square edit"></i></a></td>
                      	<td>
                          <form action="{{ url('admin/delete',$user->id) }}" method="POST">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  
  $(document).ready(function (){
    // Live Search Functoinalliy ajax
    $('#search').keyup(function(){
      var srch_value = $('#search').val();
      
        $.ajax({
            url: '{{ url('api/search') }}',
            type: 'get',
            data: {srch_value: srch_value},

            success: function(data){
               if(data.length != 0){
				      $('thead').show();

            	$("#tbody").html(' ');
            	  $.each(data, function(index, item){
	                 $("#tbody").append(`
	                 	<tr class="text-center">
	                      <td>${ index + 1 }</td>
	                      <td>${ data[index].name }</td>
	                      <td>${ data[index].email }</td>
	                      	<td><a href="{{ url('admin/edit')}}/${ data[index].id }"><i class="fa-solid fa-pen-to-square edit"></i></a></td>
	                      	<td><form action="{{ url('admin/delete')}}/${ data[index].id }" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"><i class="fa-solid fa-trash-can delete"></i></button>
                          </form></td>
	                    </tr>`);
	            	 });
               }else{
               	$('thead').hide();
               	$('#tbody').html('<h3>Data Not Found</h3>');
               } 
            }
        });
    });
  //End Live Search Functoinalliy ajax
    
  //data insert Functoinalliy ajax

    $('#submit').click(function (){
      // $('#submit').html('Please Wait...')
     
      $.ajax({
         url : '{{ url('admin/store') }}',
         type : 'POST',
         data : $('#storedata').serialize(),
          success: function(data){
            if(data.status != "success"){
              $('#alert').hide();
              $('#ul').html('');
              $.each(data.error, function(index){
                $('#ul').append(`
                  <li>${data.error[index]}</li>
                `);
              });
            }else{
              $('#closebtn').trigger('click');
              $('#alert').html('Record Add successfully').show();
                 // after insert show data in table listing
                  $.ajax({
                    url : '{{ url('admin/ajaxlisting') }}',
                    type : 'GET',
                    data : $('#storedata').serialize(),
                    success: function(response){
                      console.log(response)
                        $("#tbody").html('');

                      $.each(response, function(index, item){
                        console.log('manrahul cananda');
                        $("#tbody").append(`
                          <tr class="text-center">
                            <td>${ index + 1 }</td>
                            <td>${ response[index].name }</td>
                            <td>${ response[index].email }</td>
                            <td><a href="{{ url('admin/edit')}}/${ response[index].id }"><i class="fa-solid fa-pen-to-square edit"></i></a></td>
                            <td><form action="{{ url('admin/delete')}}/${ response[index].id }" method="POST">
                              @csrf
                              @method('delete')
                              <button type="submit"><i class="fa-solid fa-trash-can delete"></i></button>
                            </form></td>
                          </tr>`);                          
                      });  
                    }
                  });
                 // end after insert show data in table listing

            }
          }
      });
    }); 
  //data insert Functoinalliy ajax end



  });

</script>


<style>
#ul {
    list-style: none;
    background: #ffe0e0b3;
    color: red;
}
</style>
@endsection