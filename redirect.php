<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>instagram api redirect</title>
	<link rel="stylesheet" href="">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
<script>
$(function() {
	var url = window.location.hash;
	var access_token = url.replace('#access_token=', '');

	if (! window.opener || window.opener.closed) {
		//親ウィンドウが存在しない
		window.close();
	} else {
		//window.openerで親ウィンドウのオブジェクトを操作
		window.opener.getInstagramImages(access_token);
		window.opener.document.getElementById('access_token').value = access_token;
		window.close();
	}

});
</script>

</body>
</html>