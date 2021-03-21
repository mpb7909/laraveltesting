	<!--<pre style="font-size:0.66rem">{{	print_r($contacts,true)	}}</pre>-->
<h3>Contact results</h3>
	
@if(count($contacts) < 1)
	<p>There were no results for your search</p>
@else
	
	<table class="table">
		<thead>
			<th>Contact No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Acc. Number</th>
		</thead>
		<tbody>
		@foreach($contacts as $c)
		<tr class="bg-light">
			<td><a target="_blank" class="a_child_tab" href="sop/contacts/{{	$c->number	}}">{{	$c->number	}}</a></td>
			<td>{{	$c->name	}}</td>
			<td>{{	$c->email	}}</td>
			<td>{{	$c->customer_number	}}</td>
		</tr>
		@endforeach
		</tbody>
	</table>

@endif