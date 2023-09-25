<div class="form-group col-md-3 m-b-4 mb-3">
	@php
		$current_route_name = Route::currentRouteName();
	@endphp
	<select class="form-select" name="change_property_link" id="change_property_link">
		<option value="{{route('admin.properties')}}" {{(($current_route_name == 'admin.properties')?'selected':'')}}> Properties</option>
		<option value="{{route('admin.industrial.properties')}}" {{(($current_route_name == 'admin.industrial.properties')?'selected':'')}}> Industrial Property</option>
		<option value="{{route('admin.land.properties')}}" {{(($current_route_name == 'admin.land.properties')?'selected':'')}}> Land Property</option>
		<option value="{{route('admin.shared.properties')}}" {{(($current_route_name == 'admin.shared.properties')?'selected':'')}}> Shared Property</option>
	</select>
</div>
