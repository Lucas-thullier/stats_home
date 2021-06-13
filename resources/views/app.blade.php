<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"> 
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<div id="app">
		<app></app>
	</div>

	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>