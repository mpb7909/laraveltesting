
<html>
    @include('option1.partials.header')
	
	<body class="
		@if($page_control ?? 0 >= 1)	use_page_control	@endif
		@if($page_is_dev ?? 0 >= 1)		in_dev_env			@endif
	">
		
		
		
		<div id="viewport">
			<div id="page_masthead">
				<div class="container-fluid	@if($page_is_dev ?? 0 >= 1)	bg-dark text-white @endif">
				<h1>
				@if($page_is_dev ?? 0 >= 1)
				DEV-LHDB
				@else
				LVDB
				@endif
				@if(isset($page_h1)) | {{	$page_h1	}}	@endif
				
				</h1>	
				</div>
			</div>
			
			@if($page_control ?? 0 >= 1)
				
				<a id="get_page_control" href="#page_control">
					<span>Show page controls</span>
				</a>
				
				<div id="page_control" class="bg-dark text-white">
					@yield("page_control")
				</div>
				
			@endif
			
			<div id="work_area" >
				<div class="container-fluid">
					@yield("work_area")
				</div>
			</div>
		</div>
		
		
    </body>
</html>