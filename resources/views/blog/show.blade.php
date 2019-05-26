@extends('layouts.main')

@section('title', "$posts->title")

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="post-item">
				<div class="post-inner">
					<div class="post-head clearfix">
						<div class="col-md-12">
							<div class="detail">
								<h2 class="handle">{{$posts->title}}</h2>
								<div class="post-meta">
								<div class="asker-meta">
									<span>{{date('j F Y', strtotime($posts->created_at))}}</span>
									<span>by</span>
									<span><a href="">Admin</a></span>
								</div>
								<div>
									<label>Share:</label>
										<i class="fa fa-twitter"></i>
										<i class="fa fa-instagram"></i>
										<i class="fa fa-reddit"></i>
									<div class="pull-right" style="font-size: 15px;">
									  <span class="btn btn-default btn-xs" id="{{$posts->id}}-count">{{$posts->likes()->count()}} Likes</span>
					                  <span style="margin-right: 10px;" class="btn btn-default btn-xs {{$posts->YouLiked()?"liked":""}}" onclick="postLike('{{$posts->id}}', this)"><i class="fa fa-thumbs-up"></i> Like</span>
					                </div>
								</div>
								<div class="tags">
									@foreach($posts->tags as $tag)
									   <span class="label label-success"># {{$tag->name_tags}}</span>
									@endforeach
								</div>
								<div class="kategori">
									<span class="label label-default pull-right" style="font-size: 12px;">{{$posts->category->name}}</span>
								</div>
								<hr>
							</div>
						</div>
					</div>
						<div class="col-md-12">
							<div class="avatar_show text-center"><a href="#"><img src="{{asset('images/'.$posts->image)}}" style="max-height: 350px; max-width: 525px"></a></div>
								<br>
							<div class="post-content">
								<p>{!!$posts->content!!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>

					<hr> <!-- start comment -->
				<h4>Comment:</h4>
					<div class="panel with-nav-tabs panel-default">
						<div class="panel-heading">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1" data-toggle="tab">All Comment</a></li>
								<li ><a href="#tab2" data-toggle="tab">Add New Comment</a></li>
								<li ><a href="#tab3" data-toggle="tab">Disqus</a></li>
							</ul>
						</div>
						@if(Auth::guest())
						<div class="text-center">
							<br><p><li class="fa fa-sign-in"></li> Silahkan <a href="{{ route('login') }}">{{ __('Login') }}</a> Terlebih Dahulu Untuk dapat Melihat dan Menambahkan Komentar</p><br>
						</div>
						@else	
						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab1">
									@if($posts->comments->isEmpty())
										<div class="text-center">No Comment</div>
									@else
									@foreach($posts->comments as $comment)
									<div class="post-item">
										<div class="post-inner">
											<div class="post-head clearfix">
												<div class="col-md-2">
													<img src="//a.disquscdn.com/1504815928/images/noavatar92.png" style="border-radius: 90px;">
												</div>

												<div class="col-md-10">
													<p>{{$comment->comment}}</p>
														<hr>
													<p>by <a href="">{{$comment->user->name}}</a></p>
													<span class="pull-right"><small><i class="fa fa-clock-o"></i> {{$comment->created_at->diffForHumans()}}</small></span>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									@endif
								</div>

									<div class="tab-pane" id="tab2">
										<form action="{{route('newComment.store',$posts->id)}}" method="post">
											{{csrf_field()}}
											<label>Tulis Komentar: </label>
											<div class="form-group">
												<textarea class="form-control" type="text" name="comment" placeholder="tulis komentar anda disini........."></textarea>
											</div>
											<br>
											<button class="btn btn-success" type="submit">Kirim</button>
										</form>
									</div>

									<div class="tab-pane" id="tab3">
										<div id="disqus_thread"></div>
											<script>

											/**
											*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
											*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
											/*
											var disqus_config = function () {
											this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
											this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
											};
											*/
											(function() { // DON'T EDIT BELOW THIS LINE
											var d = document, s = d.createElement('script');
											s.src = 'https://dagelsteam.disqus.com/embed.js';
											s.setAttribute('data-timestamp', +new Date());
											(d.head || d.body).appendChild(s);
											})();
											</script>
											<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
									</div>

							</div>
						</div>	
						@endif				
					</div>
					 <!-- end comment -->
		</div> <!-- end col md 9 -->
					
						@include('includes.sidebar')		
				
			</div>
		</div>

@endsection

@section('js')
	<script type="text/javascript">
	  function postLike(postId, elem)
	  {
	    var csrfToken = '{{csrf_token()}}';
	    var likeCount = parseInt($('#'+postId+"-count").text());

	    $.post('{{route('postLike')}}', {postId : postId, _token:csrfToken}, function(data){
	      console.log(data);

	      if (data.message === 'liked')
	      {
	      	$('#' + postId + "-count").text(likeCount +1);
	      	$(elem).text('liked').css({color:'blue'});
	      }
	      else	
	      {
	      	$('#' + postId + "-count").text(likeCount -1);
	      	$(elem).text('unliked').css({color:'red'});
	      }

	    });
	  }
	</script>
@endsection