<div class="col-md-3">

      <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">
          <a href="{{route('totalTagIndex')}}" class="list-group-item active"><i class="fa fa-folder-o"></i> 
          Total {{$tags->total()}} Tags<small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small></a>
              @foreach($tags as $tag)
                  <a href="{{route('showTag', $tag->id)}}" class="list-group-item">
                    <i class="fa fa-tags"></i> {{ str_limit($tag->name_tags,10) }}
                      <small class="badge badge-primary pull-right">{{$tag->posts()->count()}}<i class="fa fa-laptop" aria-hidden="true"></i></small>
                  </a>     
              @endforeach         
        </div>

      <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">
          <a href="{{route('totalCategoryIndex')}}" class="list-group-item active"><i class="fa fa-folder-o"></i> Total {{$categories->total()}} Kategori <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small> </a>
              @foreach($categories as $category)
                  <a href="{{route('showCategory', $category->id)}}" class="list-group-item">
                    <i class="fa fa-list-alt"></i> {{ str_limit($category->name,10) }}
                      <small class="badge badge-primary pull-right">{{$category->posts()->count()}}<i class="fa fa-laptop" aria-hidden="true"></i></small>
                  </a>
              @endforeach
        </div>

          <div class="ads-img" style="border: 11px solid #eee;">
            <img src="../images/img-sid.jpeg" style="width: 100%; height: auto;">
          </div>

</div>

<style type="text/css">
  i{
    padding-bottom: 5px;
  }
</style>