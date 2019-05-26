@extends('admin.dashboard')
@section('title','Show All Thread')
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
        <li class="active">Users Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header text-center">
              <h3 class="box-title">Show All Users Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Permission</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  <th>Tanggal Registrasi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>As {{$user->user_type}}</td>
                      <td>
                          @if($user->isOnline())
                          <li class="text-success">Online</li>
                          @else
                          <li class="text-muted">Offline</li>
                          @endif
                      </td>
                      <td>
                          <a href="#{{$user->id}}-delete" data-target="#{{$user->id}}-delete" data-toggle="modal"><i class="fa fa-trash pull-left"></i></a>
                          <a href="#" data-toggle="modal"><i class="fa fa-edit pull-right" alt="Edit permission here"></i></a>
                      </td>
                      <td>{{date('j F Y', strtotime ($user->created_at))}}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Permission</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  <th>Tanggal Registrasi</th>
                </tr>
                </tfoot>
              </table>

              <div class="text-center">
                  {{ $users->links() }}
              </div>

              @foreach($users as $user)
                <div class="modal fade" id="{{$user->id}}-delete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus User dengan nama "<b>{{$user->name}}</b>"?</h4>
                            <small>*Klik ok untuk menghapus</small>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('users.destroy',$user->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger pull-right">OK</button>
                                  <br><br>
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