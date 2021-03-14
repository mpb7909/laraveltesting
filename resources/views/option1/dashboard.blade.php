<?php

	// echo $page_control . "<br>";
	// echo $page_is_dev . "<br>";
	// die;
	
	//echo $page_is_dev ?? -1; die;
?>
@extends("option1.layouts.template")



@section("work_area")

	<h2 class="h2_contentTitle">Site Map</h2>
	
	<ul class="tile_list dashboard">
				
		<a href="/option1/sop"><li>SOP</li></a>
		
		<a href="#"><li>MIM</li></a>
		
		<a href="#"><li>PIM</li></a>
		
		<a href="#"><li>PIM</li></a>

		<a href="#"><li>PIM</li></a>

		<a href="#"><li>PIM</li></a>
	</ul>	
	<!--
<style>
		ul.tile_list li{
			
			
		}
	</style>
	<h2 class="h2_contentTitle">Site Map</h2>
	
	<ul class="tile list-group list-group-horizontal-md">
				
		<a href="#"><li class="list-group-item">SOP</li></a>
		
		<li class="list-group-item">MIM</li>
		
		<li class="list-group-item">PIM</li>
		
	</ul>	
	-->
@endsection
