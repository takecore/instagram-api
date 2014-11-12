<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>instagram api</title>
	<link rel="stylesheet" href="">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<style>
	img {
		width: 140px;
		height: 140px;
	}
	ul.list-inline li {
		margin-bottom: 10px;
	}
	</style>
</head>
<body>

<div class="container">
	<h1>Instagram API</h1>
	<label>access token</label>
	<input type="text" id="access_token" value="">
	<br>
	<button class="btn btn-primary">instagram oauth 認証</button>
	<div class="instagram"></div>
</div>

<script>

function getInstagramImages(access_token) {
	var length = 50;
	$.ajax({
		url: "https://api.instagram.com/v1/users/self/media/recent",
		data: {
			access_token: access_token//,
			// count: -1
		},
		cache: false,
		dataType: "jsonp",
		error: function() {
			$(".instagram").html('<p class="txt01">情報の取得に失敗しました。リロードするか時間を開けてアクセスして下さい。</p>');
		},
		success: function(data) {
			console.log(data);
			$('button').remove();
			$('.instagram').append('<ul class="list-inline">');
			for (var i = 0; i < length; i++) {
				if (! data.data[i]) {
					break;
				}
				$('.instagram .list-inline').append($('<li>').append($('<a>').attr('href', data.data[i].link).attr('target', '_blank').append($('<img>').attr('src', data.data[i].images.standard_resolution.url).addClass('img-rounded'))));
			}
		}
    });
}

$(function() {
	$('button').on('click', function() {
		var client_id = 'your_client_id';
		var redirect_uri = 'http://<?php echo $_SERVER['HTTP_HOST'] ?>/redirect.php';
		var url = 'https://instagram.com/oauth/authorize/?client_id='+client_id+'&redirect_uri='+redirect_uri+'&response_type=token';
		window.open(url, 'api_instagram', 'width=640,height=480');
	});
});
</script>

</body>
</html>