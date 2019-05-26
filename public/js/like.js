var postId = 0;

$('.like').on('click', function(event){
	event.preventDefault();
	postId = event.target.parentNode.dataset['postId'];
	var isLike = event.target.previousElementSibling == null;

	$.ajax({
		method : 'POST',
		url : urlLike,
		data : {isLike: isLike, postId: postId, _token: token}
	})
	.done(function(){
		event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Anda Menyukai Postingan ini' : 'Like' : event.target.innerText == 'Dislike' ? 'Anda Tidak Menyukai Postingan ini': 'Dislike';
		if(isLike)
		{
			event.target.nextElementSibling.innerText = 'Dislike';
		}
		else
		{
			event.target.previousElementSibling.innerText = 'Like';
		}
	});
});