@if (count($errors)>0)

<div class="alert alert-danger container">
	<ul>
		
		@foreach($errors->all() as $errors)
		<li>
			{{$errors}}
		</li>
		@endforeach

	</ul>
</div>

@endif

@if(session('info'))
<div class="alert alert-success container">
	<i class="fa fa-check"></i>{{session('info')}}
	
</div>
@endif