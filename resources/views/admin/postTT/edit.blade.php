@extends('admin.dashboard')
@section('title','Edit Post Tips & Trik')
@section('content')

@can('isAdmin')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Form Posts
        <small>Admin Featurs</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Edit Form</li>
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
              <h2 class="box-title">Edit Post Tips & Trik</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('posts.update', $posts->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('put')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="title" class="text-dark">Title: </label>
                  <input type="" name="title" class="form-control " value="{{$posts->title}}" placeholder="input title">
                </div>

                <div class="form-group">
                  <label for="image" class="text-dark">Pilih gambar: </label>
                  <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                  <img src="{{asset('images/'.$posts->image)}}" style="width: 25%; height: 225px"> <small>*previous images</small>
                </div>

                <div class="form-group">
                  <label for="category_id" class="text-dark">Category: </label>
                  <select name="category_id" class="form-control">
                    <option value="" class="disable selected">pilih kategori</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" <?php if($posts->category_id == $category->id) {echo "selected";}?> >{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="tags" class="text-dark">Tags: </label>
                  <select name="tags[]" multiple="multiple" class="form-control tags">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name_tags}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="content" class="text-dark">Content: </label>
                  <textarea type="" name="content" class="form-control " placeholder="input content">{!! strip_tags($posts->content) !!}</textarea>
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
<script type="text/javascript">
   CKEDITOR.replace( 'content' );
</script>
@endsection

@section('js')
  <script type="text/javascript">
    $(".tags").select2().val({!! json_encode($posts->tags()->allRelatedIds() ) !!}).trigger('change')({
        placeholder: "Select tags here",
        maximumSelectionLength: 2
    });

     CKEDITOR.replace( 'content', {
      extraPlugins: 'codesnippet',
      codeSnippet_theme: 'monokai_sublime'
    });
  </script>
@endsection