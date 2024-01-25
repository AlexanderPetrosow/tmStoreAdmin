<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="token" id="token" content="{{csrf_token()}}">
	<title>Поле загрузки файлов, которое мы заслужили</title>
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/script.js')}}"></script>

</head>
<body>
	<form id="upload-container" method="POST" action="/upload">
		<img id="upload-image" src="upload.svg">
		<div>
			<input id="file-input" type="file" name="file" multiple>
			<label for="file-input">Выберите файл</label>
			<span>или перетащите его сюда</span>
		</div>
	</form>
    <div class="success" style="display:none;">Worked!</div>
</body>
</html>