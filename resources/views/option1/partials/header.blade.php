<?php
	//	echo $page_is_dev; die;

?>
<head>
	<title>LVDB @if(isset($page_title))	| {{	$page_title	}}	@endif</title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta id="meta_csrf" name="csrf-token" content="{{ csrf_token() }}" />
	
	<script
		  src="https://code.jquery.com/jquery-3.5.1.min.js"
		  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		  crossorigin="anonymous">
	</script>
	<script src="/cdn/option1/dom.js"></script>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link rel="stylesheet" href="/cdn/option1/template.css" >
	
</head>