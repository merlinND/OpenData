<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>{{ isset($pageTitle) ? $pageTitle : 'My Amazing Page' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{{ isset($pageDescription) ? $pageDescription : 'My amazing decription' }}">

	{{ HTML::style('assets/bootstrap/css/bootstrap.min.css'); }}
	{{ HTML::style('assets/css/screen.css'); }}
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
		</head>
		<body>
			<div class="homepage-photo-container">
