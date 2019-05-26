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
        <li class="active">Posts Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Tips & Trik Posts (Edit & Delete)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul Postingan</th>
                  <th>Kategori Post</th>
                  <th>Tags  Postingan</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Edit</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                    <tr>
                      <td>{{$post->id,25}}</td>
                      <td>{{ str_limit($post->title, 25) }}</td>
                      <td>{{ str_limit($post->category->name,20) }}</td>
                      @foreach($post->tags as $tag)
                        <td class="badge badge-success" style="height: 30px; margin-top: 2%;">{{ str_limit($tag->name_tags, 10) }}</td>
                      @endforeach
                      <td><a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-edit pull-center openBtn"></i></a></td>
                      <td><a href="#{{$post->id}}-delete" data-toggle="modal"><i class="fa fa-trash pull-center"></i></a></td>
                      <td>{{date('j F Y', strtotime ($post->updated_at))}}</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Judul Postingan</th>
                  <th>Kategori Post</th>
                  <th>Tags  Postingan</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Tanggal Edit</th>
                </tr>
                </tfoot>
              </table>

              @foreach($posts as $post)
                <div class="modal fade" id="{{$post->id}}-delete">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Hapus Post "<b>{{$post->title}}</b>"?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Hapus</button>
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