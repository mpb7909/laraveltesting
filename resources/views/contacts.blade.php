@extends("layouts.template")

@section("content")
	
	@if(isset($contacts))
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8" style="background-color:rgb(255,255,235)">
			<table class="table table-sm">
			@foreach($contacts as $c)
				<tr>
				<td style="width:15%">{{	$c->contact_number	}}</td>
				<td style="width:70%">{!!	str_replace(" ","<br>",$c->contact_name)	!!}</td>
				<td style="width:17%"><pre>{{ $c->created_date,true	}}</td>
				</tr>
			@endforeach
			</table>
			</div>
			</div>
	@else
		
		<p>No contacts found</p>
	
	@endif
@endsection