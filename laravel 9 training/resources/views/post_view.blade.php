@extends('layouts.app')
    
@section('content')
    
<pre>
  <?php
  
//   print_r($posts[0]->post_name);
  
  ?>

</pre>
    <div class="container">
        <div class="col-sm-12 m-auto">
      
            <select id="postdata" onchange="loaddata()">
                <option selected>please select...</option>
                <option value="asc">A-to-Z</option>
                <option value="dsc">Z-to-A</option>
                <option value="dateasc">date-assending</option>
                <option value="datedesc">date-dessending</option>
            </select><br>

            <table class="table-bordered" id="load_table">
                <thead>
                  <tr class="text-center">
                    <th>Id</th>
                    <th>post_name</th>
                    <th>post_description</th>
                    <th>tag</th>
                  <tr>
                </thead>

               
                <tbody id="tbody"> 
                  @foreach ($posts as $post)  
                    <tr class="text-center" id="table_trdefault">
                      <td id="id">{{ $post->id }}</td>
                      <td id="postname">{{ $post->post_name }}</td>
                      <td id="postdescription">{{ $post->post_description }}</td>
                      <td id="tag">{{ $post->tag }}</td>
                    <tr>
                  @endforeach 
                </tbody>

              

          </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
         
          function loaddata(){
            var postdata  = document.getElementById("postdata").value;

            var thd = $(this);
            $.ajax({
              url: "{{ url('admin/sorting') }}",
              type: "GET",
              data: {postdata: postdata},
              success: function(data){
                 $('#tbody').html(data);    
              }

            });

            
          }

    </script>

@endsection