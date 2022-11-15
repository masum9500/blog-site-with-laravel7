@extends('backend.master.layout')
@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <table class="table table-bordered">
          @foreach($blogs as $blog)
          <tr>
            <td>Title:</td><td>{{ $blog->blog_tittle }}</td>
          </tr>
          <tr>
            <td>Description:</td><td>{{ $blog->blog_description }}</td>
          </tr>
          <tr>
            <td>Email:</td><td>{{ $blog->email }}</td>
          </tr>
          <tr>
            <td>Image:</td><td><img src="{{ asset('uploads/'.$blog->image) }}"></td>
          </tr>
          <tr>
            <td>Status:</td><td>
              <form action="{{ route('updateStatus')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $blog->id }}">
                <select name="active">
                  <option>Status....</option>
                  <option value="2">Approve</option>
                  <option value="0">Cancel</option>
                </select>
                <input type="submit" value="Update">
              </form>
            </td>
          </tr>
                              
          @endforeach
        </table>
      </div>
    </div>
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection



  