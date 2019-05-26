@extends('admin.dashboard')
@section('title','Create Category')
@section('content')

@can('isAdmin')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Form Posts
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
        <div class="col-md-12" >
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h2 class="box-title">Create Post Tips & Trik</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
              <div class="box-body">
                {{csrf_field()}}

                <div class="form-group">
                  <label for="title" class="text-dark">Title: </label>
                  <input type="" name="title" class="form-control" placeholder="input title">
                </div>

                <div class="form-group">
                  <label for="image" class="text-dark">Pilih gambar: </label>
                  <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                  <label for="category_id" class="text-dark">Category: </label>
                  <select name="category_id" class="form-control">
                    <option value="" class="disable selected">pilih kategori</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group text-dark">
                  <label for="tags">Tags: </label>
                  <select name="tags[]" multiple="multiple" class="form-control tags">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name_tags}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="content" class="text-dark">Content: </label>
                  <textarea type="" name="content" class="form-control" placeholder="input content"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
              </div>
            </form>
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

@section('ck_editor')
      <script>
          CKEDITOR.replace( 'content' );
      </script>
@endsection

@section('js')

  <script type="text/javascript">
    $(".tags").select2({
        placeholder: "Select tags here",
        maximumSelectionLength: 4
    });
  </script>

@endsection