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
          <tr>
            <th>SL No.</th>
            <th>Title:</th>
            <th>Email:</th>
            <th>Activation:</th>
            <th>Status:</th>
          </tr>
          @foreach($blog as $key => $blogs)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ substr($blogs->blog_tittle,0,50) }}</td>
            <td>{{ $blogs->email }}</td>
            <td>@if($blogs->active == 0){{ "Cancenlled" }} @elseif($blogs->active == 1){{ "Pendding" }} @else {{ "Approved" }} @endif</td>
            <td><a href="{{ route('blogDetails', $blogs->id) }}">Details</a></td>
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



  