@extends('layouts.main')
@section('title', 'Search Result')

@section('content')

	@if(count($posts)> 0)

		<div class="container">
			<div class="text-center">
				<h1>- Hasil Pencarian -</h1>
			</div>

			@foreach($posts->all() as $post)
				<div class="post-item">
					<div class="post-inner">
						<div class="post-head clearfix">
							<div class="col-md-4">
								<a href=""><img src="{{asset('images/'.$post->image)}}" style="width: 100%; height: 200px;"></a>
							</div>
							<div class="col-md-8">
								<div class="detail">
									<h2 class="handle"><a href="{{route('postShow',$post->slug)}}">{{$post->title}}</a></h2>
								</div>
								<div class="post-meta">
									<div>
										<span>{{date('j F Y', strtotime($post->created_at))}}</span>
										<span>| by</span>
										<span>Admin</span>
									</div>
								</div>
								<span class="share">
									<i class="fa fa-facebook"></i>
									<i class="fa fa-twitter"></i>
									<i class="fa fa-instagram"></i>
								</span>

								@foreach($post->tags as $tag)
									<span class="label label-success">{{$tag->name_tags}}</span>
								@endforeach

								<div class="content" style="margin-top: 12px;">
									{!!str_limit($post->content,200)!!}
								</div>

							</div>
						</div>					
					</div>
				</div>
			@endforeach
		</div>
		<br>

	@elseif(count($beasiswas)> 0)

		<div class="container">
			<div class="text-center">
				<h1>- Hasil Pencarian -</h1>
			</div>

			@foreach($beasiswas->all() as $beasiswa)
				<div class="post-item">
					<div class="post-inner">
						<div class="post-head clearfix">
							<div class="col-md-4">
								<a href=""><img src="{{asset('images/'.$beasiswa->img_bea)}}" style="width: 100%; height: 200px;"></a>
							</div>
							<div class="col-md-8">
								<div class="detail">
									<h2 class="handle"><a href="{{route('beasiswaShow',$beasiswa->title)}}">{{$beasiswa->title}}</a></h2>
								</div>
								<div class="post-meta">
									<div>
										<span>{{date('j F Y', strtotime($beasiswa->created_at))}}</span>
										<span>| by</span>
										<span>Admin</span>
									</div>
								</div>
								<span class="share">
									<i class="fa fa-facebook"></i>
									<i class="fa fa-twitter"></i>
									<i class="fa fa-instagram"></i>
								</span>

								@foreach($beasiswa->tags as $tag)
									<span class="label label-success">{{$tag->name_tags}}</span>
								@endforeach

								<div class="content" style="margin-top: 12px;">
									{!!str_limit($beasiswa->content,200)!!}
								</div>

							</div>
						</div>					
					</div>
				</div>
			@endforeach
		</div>
		<br>

	@elseif(count($kompetisis)> 0)

		<div class="container">
			<div class="text-center">
				<h1>- Hasil Pencarian -</h1>
			</div>

			@foreach($kompetisis->all() as $kompetisi)
				<div class="post-item">
					<div class="post-inner">
						<div class="post-head clearfix">
							<div class="col-md-4">
								<a href=""><img src="{{asset('images/'.$kompetisi->img_komp)}}" style="width: 100%; height: 200px;"></a>
							</div>
							<div class="col-md-8">
								<div class="detail">
									<h2 class="handle"><a href="{{route('kompetisiShow',$kompetisi->title)}}">{{$kompetisi->title}}</a></h2>
								</div>
								<div class="post-meta">
									<div>
										<span>{{date('j F Y', strtotime($kompetisi->created_at))}}</span>
										<span>| by</span>
										<span>Admin</span>
									</div>
								</div>
								<span class="share">
									<i class="fa fa-facebook"></i>
									<i class="fa fa-twitter"></i>
									<i class="fa fa-instagram"></i>
								</span>

								@foreach($kompetisi->tags as $tag)
									<span class="label label-success">{{$tag->name_tags}}</span>
								@endforeach

								<div class="content" style="margin-top: 12px;">
									{!!str_limit($kompetisi->content,200)!!}
								</div>

							</div>
						</div>					
					</div>
				</div>
			@endforeach
		</div>
		<br>

	@else

		<div class="container" style="margin-bottom: 9%;">
			<h1 class="text-center">- Hasil Pencarian -</h1>
					<hr><br><br><br>
				<div class="text-center post-item">
					<div class="post-inner">
						<h4>No Result Find -__- </h4>
					</div>
				</div>
		</div>
		<br><br><br><br><br>


	@endif

@endsection