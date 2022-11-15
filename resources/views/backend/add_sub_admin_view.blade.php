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
        		<th>Name:</th>
        		<th>Email:</th>
        		<th>Status:</th>
        	</tr>
        	@foreach($subadminlist as $subadminlists)
        	<tr>
        		<td>{{ $subadminlists->name }}</td>
        		<td>{{ $subadminlists->email }}</td>
        		<td>@if($subadminlists->status == 0) <a href="{{ route('inactive', $subadminlists->id) }}">Active</a> @else <a href="{{ route('active', $subadminlists->id) }}">Inactive</a> @endif</td>
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