@extends('layouts.adminapp')

@section('admin-content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 pl-5 d-flex align-items-center flex-column">
			<div class="card">
				<div class="card-header">
					<h1>Use data update</h1>
				</div>
				<div class="card-body">
                  <form method="post" enctype="multipart/form-data" action = "{{ url('admin/update',$edit_data->id )}}">
                      @csrf
                    <div class="form-group">
                      <label for="fname">Name:</label>
                      <input type="text" name="name" class="form-control" placeholder="Edit name * "
                          value="{{ $edit_data->name }}">
                            @error('name')
                              <span class="span">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                      <br><label for="email">Email:</label>
                      <input type="text" name="email" class="form-control" placeholder="Edit Email * "
                          value="{{ $edit_data->email }}">
                          @error('email')
                             <span class="span"> {{$message}}</span>
                          @enderror
                    </div>
                        <button type="submit" name="submit" class="btn btn-info mt-2" style="width:100%">Submit</button>
                   </form>
                  </div><br>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection