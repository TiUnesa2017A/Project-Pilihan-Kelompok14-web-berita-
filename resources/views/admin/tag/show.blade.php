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
        <li class="active">Tag Data tables</li>
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
              <h3 class="box-title">All Tag Data (Edit & Delete)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Tag</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $showTag)
                  <tr>
                    <td>{{$showTag->id}}</td>
                    <td>{{$showTag->name_tags}}</td>
                    <td><a href="#{{$showTag->id}}" data-target="#{{$showTag->id}}" data-toggle="modal"><i class="fa fa-edit pull-center openBtn"></i></a></td>
                    <td><a href="#{{$showTag->id}}-delete" data-toggle="modal"><i class="fa fa-trash pull-center"></i></a></td>
                    <td>{{$showTag->created_at->diffforHumans()}}</td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nama Tag</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Edit</th>
                </tr>
                </tfoot>
              </table>

              @foreach($tags as $showTag)
                <div class="modal fade" id="{{$showTag->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('tags.update', $showTag->id)}}" method="post"
                              role='form'>
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-group">
                                  <input type="text" name="name_tags" class="form-control" value="{{$showTag->name_tags}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </form>
                          </div>
                            <!--  <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div> -->
                        </div>
                      </div>
                    </div>
              @endforeach


              @foreach($tags as $showTag)
                <div class="modal fade" id="{{$showTag->id}}-delete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Tag "<b>{{$showTag->name_tags}}</b>"?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('tags.destroy', $showTag->id)}}" method="post">
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