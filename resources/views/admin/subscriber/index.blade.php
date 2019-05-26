@extends('admin.dashboard')
@section('title','Show All Subscriber User')
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
        <li class="active">Subscriber Data tables</li>
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
              <h3 class="box-title">All Subscriber Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Subscribe</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $subscribe)
                  <tr>
                    <td>{{$subscribe->id}}</td>
                    <td>{{$subscribe->email}}</td>
            
                    <td><button class="btn btn-info"><a href="##{{$subscribe->id}}" data-toggle="modal"><i class="fa fa-edit pull-center"  style="color: black;">  Edit</i></a></button></td>
                    <td><button class="btn btn-danger"><a href="#{{$subscribe->id}}-delete" data-toggle="modal"><i class="fa fa-trash pull-center"  style="color: black;">  Hapus</i></a></button></td>

                    <td>{{date('j F Y', strtotime ($subscribe->created_at))}}</td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Subscribe</th>
                </tr>
                </tfoot>
              </table>


              @foreach($subscribers as $subscribe)
                <div class="modal fade" id="{{$subscribe->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Subscriber</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="#" method="post"
                              role='form'>
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-group">
                                  <h2>Sorry. This Features Not Supporting Yet, Keep Supporting Us to Build This App Going Final Project</h2>
                                </div>   
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

              @foreach($subscribers as $subscribe)
                <div class="modal fade" id="{{$subscribe->id}}-delete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Subscriber "<b>{{$subscribe->email}}</b>"?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('subscriberDestroy',$subscribe->id)}}" method="post">
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