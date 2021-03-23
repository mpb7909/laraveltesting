<?php
	//	echo $page_is_dev; die;

?>
<head>
	@if($page_is_dev ?? 0 >= 1)
	<title>DEV-LVDB @if(isset($page_title))	| {{	$page_title	}} @endif </title>
	@else
	<title>LVDB @if(isset($page_title))	| {{	$page_title	}} @endif </title>
	@endif
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta id="meta_csrf" name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script
		  src="https://code.jquery.com/jquery-3.5.1.min.js"
		  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
		  crossorigin="anonymous">
	</script>
	<script src="/cdn/option1/dom.js"></script>
	@if(isset($page_js))
		@foreach($page_js as $js)
		
			<script src="{{		$js		}}"></script>
		@endforeach
	@endif
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link rel="stylesheet" href="/cdn/option1/template.css" >
	
</head>