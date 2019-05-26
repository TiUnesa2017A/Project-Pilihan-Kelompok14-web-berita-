@extends('admin.dashboard')
@section('title','Show All Category')
@section('content')

@can('isAdmin')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>Admin Featueres</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Category Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-7 container">
          @include('includes.info') <br>
        </div>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Category Data (Edit & Delete)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kategori</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $showcat)
                  <tr>
                    <td>{{$showcat->id}}</td>
                    <td>{{$showcat->name}}</td>
                    <td><a href="#{{$showcat->id}}" data-target="#{{$showcat->id}}" data-toggle="modal"><i class="fa fa-edit pull-center openBtn"></i></a></td>
                    <td><a href="#{{$showcat->id}}-delete" data-toggle="modal"><i class="fa fa-trash pull-center"></i></a></td>
                    <td>{{date('j F Y', strtotime ($showcat->updated_at))}}</td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Kategori</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Edit</th>
                </tr>
                </tfoot>
              </table>

              @foreach($category as $showcat)
                <div class="modal fade" id="{{$showcat->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('category.update',$showcat->id)}}" method="post"
                              role='form'>
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-group">
                                  <input type="text" name="name" class="form-control" value="{{$showcat->name}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </form>
                          </div>
        <!--                  <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div> -->
                        </div>
                      </div>
                    </div>
              @endforeach


              @foreach($category as $showcat)
                <div class="modal fade" id="{{$showcat->id}}-delete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Kategori "<b>{{$showcat->name}}</b>"?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('category.destroy',$showcat->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-primary">Hapus</button>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
              @endforeach
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  @endcan
@endsection