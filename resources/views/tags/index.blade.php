@extends('layouts.main')
@section('title', 'Tags Index')

@section('content')


<div class="container-fluid">

	<h2 class="text-center text-dark">Postingan Berdasarkan Tags</h2>
		<br>

  <!-- <ul class="nav nav-tabs">
    <li class="active" style="padding-right:50px; padding-left: 25px;"><a data-toggle="tab" href="#home">Artikel Tag</a></li>
    <li><a data-toggle="tab" href="#menu1" style="padding-right:50px">Beasiswa Tag</a></li>
    <li><a data-toggle="tab" href="#menu2" style="padding-right:50px">Kompetisi Tag</a></li>
    <li><a data-toggle="tab" href="#menu3" style="padding-right:50px">Materi Tag</a></li>
    <li><a data-toggle="tab" href="#menu4" style="padding-right:50px">Project Tag</a></li>
  </ul> -->

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<br>
      <div class="container-fluid">
		
			<div class="well">
				<div class="text-center text-dark"><h1>All Tags  <small>[ {{$tags->total()}} ]</small></h1></div>
					<hr>
					@foreach($tags as $tag)

						<h4><a href="{{route('showTag',$tag->id)}}">{{$tag->name_tags}}</a></h4>
					<span><small class="text-muted float-right"><i class="fa fa-clock-o"></i>{{$tag->created_at->diffForHumans()}}</small></span>
					<div style="border-bottom: 1px solid grey; margin-bottom: 15px;">
					  <span>{{$tag->posts()->count()}} <i class="fa fa-list-alt"></i> Artikel Posts |</span>
					</div>

					@endforeach

					<div class="text-center">
						{{ $tags->links() }}
					</div>
			</div>
	  </div>
    </div> <!-- End menu1 -->

 </div> <!-- end tab content -->
</div>



@endsection