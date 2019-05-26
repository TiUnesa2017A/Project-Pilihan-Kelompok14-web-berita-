// $(function (){
// 	$('#markasread').click(function (){
// 		alert('clicked')
// 	})
// })

function markNotificationAsRead(notificationCount) {
	if(notificationCount !== '0'){
		$.get('/markAsRead');
	}
}