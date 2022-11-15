@extends('backend.master.layout')
@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	@if(Session::has('insert'))
      		<p>{{ Session::get('insert') }}</p>
      	@endif
        <form action="{{ url('submiteBlog') }}" method="post" enctype="multipart/form-data">
        	@csrf
		  <div class="form-group row">
		    <label for="inputEmail3" class="col-sm-2 col-form-label">Post Tittle</label>
		    <div class="col-sm-10">
		      <input type="text" name="blog_tittle" class="form-control" id="inputEmail3" placeholder="Post Tittle">
		    </div>
		  </div>
		  @if($errors->has('blog_tittle'))
		  	{{ $errors->first('blog_tittle') }}
		  @endif
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Post Description</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" name="blog_description" id="exampleFormControlTextarea1" rows="5"></textarea>
		    </div>
		  </div>
		   @if($errors->has('blog_description'))
		  	{{ $errors->first('blog_description') }}
		  @endif
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email Address">
		    </div>
		  </div>
		  @if($errors->has('email'))
		  	{{ $errors->first('email') }}
		  @endif
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
		    <div class="col-sm-10">
		      <input type="text" name="phone" class="form-control" id="inputEmail3" placeholder="Phone Number">
		    </div>
		  </div>
		  @if($errors->has('phone'))
		  	{{ $errors->first('phone') }}
		  @endif
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Choose Image</label>
		    <div class="col-sm-10">
		      <input type="file" name="image">
		    </div>
		  </div>
		  @if($errors->has('image'))
		  	{{ $errors->first('image') }}
		  @endif
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-2 col-form-label">Referance Date</label>
		    <div class="col-sm-10">
		      <input type="date" name="ref_date" class="form-control">
		    </div>
		  </div>
		  <fieldset class="form-group">
		    <div class="row">
		      <legend class="col-form-label col-sm-2 pt-0">Status</legend>
		      <div class="col-sm-10">
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="active" id="gridRadios1" value="1" checked>
		          <label class="form-check-label" for="gridRadios1">
		            Active
		          </label>
		        </div>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="active" id="gridRadios2" value="2">
		          <label class="form-check-label" for="gridRadios2">
		            Inactive
		          </label>
		        </div>
		      </div>
		    </div>
		  </fieldset>
		  <div class="form-group row">
		    <div class="col-sm-10">
		      <button type="submit" class="btn btn-success">Add New</button>
		    </div>
		  </div>
		</form>
		<a href="{{ route('/') }}">Show All</a>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection