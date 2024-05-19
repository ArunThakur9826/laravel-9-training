

@extends('layouts.app')

@section('content')
<section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                         
                            <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
                            <div class="alert alert-danger" id="error" style="display: none;">
                                <span ></span>
                            </div>
                            <div class="alert alert-success" id="success" style="display: none;">
                                <span ></span>
                            </div>

                            <div class="input-group">
                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                <input type="text" class="form-control" id="email" placeholder="Enter your email">
                                <span class="input-group-btn">
                                    <button class="btn" id="btn" type="submit">Subscribe Now</button>
                                </span>
                            </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn').click(function(e){
                e.preventDefault();
                var email = $('#email').val();
                $.ajax({
                    url: "{{ url('newsletter/response') }}",
                    type: "POST",
                    data: {
                      _token: $("#csrf").val(),
                      email: email,
                    },  
                    success: function(data){ 
                         if(data.status != "success"){
                           $('#error').show();
                           $('#success').hide();
                           $('#error').html(data.error); 
                       }else{
                          $('#error').hide();
                          $('#success').text('Thanks for subscribe').show();

                       }
                    }
                });
            })
        })
    </script>

@endsection