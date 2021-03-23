@if(count($customers ?? array()) < 1 && count($customers ?? array()) < 1) 	
	
	<p>There were no results for your search</p>

@else
	
	@if($contacts ?? -1!== -1)
		<h3>Contact results</h3>
		<table class="table">
			<thead>
				<th>Contact No.</th>
				<th>Name</th>
				<th>Email</th>
				<th>Acc. Number</th>
			</thead>
			<tbody>
			@foreach($contacts as $pc)
				<tr class="bg-dark">
					<td>{{	$pc->number	}}</td>
					<td>{{	$pc->name	}}</td>
					<td>{{	$pc->email	}}</td>
					<td>{{	$pc->customer_id	}}</td>
				</tr>			
			@endforeach		
			</tbody>
		</table>
	
	@endif
	
	@if($customers ?? -1!== -1)
		<h3>Customers results</h3>
		<table class="table">
		<thead>
		<th>Customer No.</th>
		<th>Name</th>
		<th>Posting Group</th>
		<th>Blocked</th>
		</thead>
		<tbody>
		@foreach($customers as $c)
			<tr class="bg-light">
				<td>{{	$c->number	}}</td>
				<td>{{	$c->name	}}</td>
				<td>{{	$c->posting_group	}}</td>
				<td>@if($c->blocked > 0)	YES	@else NO @endif</td>
			</tr>			
		@endforeach
		</tbody>
		</table>
	@endif
@endif
