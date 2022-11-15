<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body {
  
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}



    </style>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
          	@if(Session::has('register'))
          		<p style="text-align: center;">{{ Session::get('register') }}</p><br>
          	@endif
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login Form</h5>
            <form action="{{ url('loginsubmit') }}" method="post">
            	@csrf
              <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                  in</button>
              </div>
              <hr class="my-4">
              
            </form>






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
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Registration</button>
              </div>
              <hr class="my-4">
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>