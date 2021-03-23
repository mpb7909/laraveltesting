@extends("option1.layouts.template")
	
	

@section("work_area")
	
	@include('option1.partials.sop-search-results')

@endsection

@section("page_control")
	
	<form id="sop_search" class="ajax_form" action="sop/ajax_handle?mpb=1" method="POST">
		<input type="hidden" name="_token" value="{{	csrf_token()	}}" />
		<input type="hidden" class="ajax_action" name="ajax_action" value="ajax_sopSearch" />
		<input type="hidden" class="ajax_callback" value="" />
		<input type="hidden" class="ajax_precall" value="" />
		<input type="hidden" class="ajax_delay" name="ajax_delay" value="" />
		
		<h3>Search SOP</h3>
		<div class="form-group">
			<!--<label for="search_term">Search</label>-->
			<input type="text" class="form-control" placeholder="Add search term" id="search_term" name="search_term" autocomplete="off"/>
		</div>
		
		<!--<button>SEARCH</button>-->
		
	</form>
	<div class="page_control_divider"></div>
	
	@include('option1.partials.site-directory-in-page-con')
	
	
	
@endsection