
<html>
    @include('option1.partials.header')
	
	<body class="
		@if($page_control ?? 0 >= 1)	use_page_control	@endif
		@if($page_is_dev ?? 0 >= 1)		in_dev_env			@endif
	">
		
		@if($page_is_dev ?? 0 >= 1)
		<div id="dev_warning_top" class="dev_warning bg-info text-white">***DEV ENVIRONMENT***</div>
		@endif
		
		<div id="viewport">
			<div id="page_masthead">
				
				<h1>LVDB
				@if(isset($page_h1)) | {{	$page_h1	}}	@endif</h1>	
				
			</div>
			
			@if($page_control ?? 0 >= 1)
				
				<a id="get_page_control" href="#page_control">
					<span>Show page controls</span>
				</a>
				
				<div id="page_control" class="bg-dark text-white">
					<h2>This is page control</h2>
				</div>
				
			@endif
			
			<div id="work_area" >
				<div class="container-fluid" style="border:solid red 0.1rem;">
					@yield("work_area")
				</div>
			</div>
		</div>
		
		@if($page_is_dev ?? 0 >= 1)
		<div id="dev_warning_bottom" class="dev_warning bg-info text-white">***DEV ENVIRONMENT***</div>
		@endif
		
    </body>
</html>