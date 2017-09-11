@extends('layouts/app')

@section('content')
	<div id="app">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Search User</th>
					<th>Twitter Name</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(people, index) in peoples">
					<td>@{{ people.name }}</td>
					<td>
						<div style="width: 300px;">
							<typeahead 
							@@select-item="SelectItem"
							:cpindex="index" 
							cpsrc="https://typeahead-js-twitter-api-proxy.herokuapp.com/demo/search" 
							placeholder="Type text">
							</typeahead>
						</div>
					</td>
					<td>@{{ people.alias }}</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection

@section('scripts')
	{!! Html::script('assets/js/pages/vuetest.js') !!}
@endsection