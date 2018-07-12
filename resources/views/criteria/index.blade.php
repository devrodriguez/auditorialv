@extends('layouts/app')

@section('head')
	{!! Html::style('assets/css/pages/itemAudit.css') !!}
@endsection

@section('content')
	@foreach($criterias as $criteria)
	<blockquote>
		<div class="pull-right">
			<a href="{{ route('criteria.edit', $criteria->id) }}" class="btn btn-sm btn-primary">Editar</a>
			{!! Form::open(['route' => ['criteria.destroy', $criteria->id], 'method' => 'DELETE']) !!}
				<button class="btn btn-sm btn-danger">
					<i class="fa fa-trash-o" aria-hidden="true"></i>
					Eliminar
				</button>
			{!! Form::close() !!}
        </div>
		<p>{{ $criteria->name }}</p>
		<small>{{ $criteria->description }}</footer>				
	</blockquote>
	@endforeach
@endsection

@section('scripts')
	
@endsection