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
							cp-src="https://typeahead-js-twitter-api-proxy.herokuapp.com/demo/search"
							placeholder="Type text"
							v-model="people.alias"
							:cpindex="index"
							:cp-local="true"
							:cp-order="['name']"
							cp-store-key="data">
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