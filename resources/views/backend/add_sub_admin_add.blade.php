@extends('backend.master.layout')
@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            @if(Session::has('register'))
              <p style="text-align: center;">{{ Session::get('register') }}</p><br>
            @endif
            <h5 class="card-title text-center mb-5 fw-light fs-5">Registration Form</h5>
            <form action="{{ url('registration') }}" method="post">
              @csrf
              @if($errors->has('name'))
                {{ $errors->first('name') }}
              @endif
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="enter name" name="name">
                <label for="floatingInput">Full Name</label>
               </div>
               @if($errors->has('name'))
                {{ $errors->first('email') }}
              @endif
              <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              @if($errors->has('password'))
                {{ $errors->first('password') }}
              @endif
              <div class="form-floating mb-3">
                <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
              <input type="hidden" name="role_id" value="2">
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" style="font-size: 0.9rem;letter-spacing: 0.05rem;padding: 0.75rem 1rem;" type="submit">Registration</button>
              </div>
              <hr class="my-4">
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

































 