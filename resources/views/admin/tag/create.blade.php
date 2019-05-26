@extends('admin.dashboard')
@section('title','Create Category')
@section('content')

@can('isAdmin')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Form Tags
        <small>Admin Featurs</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Create Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-7 container">
          @include('includes.info') <br>
        </div>
        <!-- right column -->
        <div class="col-md-10" style="margin-left: 4%; margin-top: 2%;">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('tags.store')}}" class="form-horizontal" method="post">
              {{csrf_field()}}
              <div class="box-body">
                <h2 class="card-header text-center" style="color: black;">Buat Tag</h2>
                  <br>
                  <hr>
                  
                <div class="form-group col-sm-12">
                  <input type="text" name="name_tags" class="form-control" placeholder="buat kategori baru....">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        <!--/.col (right) -->
        <div class="col-md-2"></div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endcan
@endsection