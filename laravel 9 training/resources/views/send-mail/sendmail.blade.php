



@extends('layouts.app')

@section('content')
  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-12">
          <div class="form h-100">
            <h3>Get Started</h3>
            @if(session('success'))
               <div class='alert alert-success'>
                  {{ session('success') }}
               </div>
             @endif
            <form class="mb-5" method="post" action="{{ route('emailresponse') }}" id="contactForm" name="contactForm">
            	@csrf
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Name *</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name">
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Email *</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Your email">
                   @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
      

                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">subject *</label>
                  <input type="text" class="form-control" name="subject" id="subject"  placeholder="Your email">
                   @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


        
                <div class="col-md-6 form-group mb-3">
                  <label for="message" class="col-form-label">Comment *</label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Write your message"></textarea>
                   @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
        
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>

  </div>

@endsection