@extends('layouts/app')

@section('head')
	{!! Html::style('assets/css/pages/auditor.css') !!}
@endsection

@section('content')
	<!-- Formulario -->
	<header>
		<form action="{{ route('store_auditor_path') }}" method="POST">
			<!-- Genera un token de autentificacion requerido por laravel -->
			{{ csrf_field() }}
			<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="role">Cargo</label>
				<input name="role" class="form-control">
			</div>
			<button type="submit" class="btn btn-success btn-cabadelpa-confirm">
				<i class="fa fa-save" aria-hidden="true"></i>
				Guardar
			</button>
		</form>
	</header>
	<hr>
	@foreach($auditors as $auditor)
	<blockquote>
		<div class="row">
			<div class="col-sm-2">
				<img src="{{ url('assets/images/avatar-test.png') }}" class="img-circle" style="height: 100px;" />
			</div>
			<div class="col-sm-10">
				<div class="pull-right">
					{!! Form::open(['route' => ['delete_auditor', $auditor->id], 'method' => 'DELETE']) !!}
						<button class="btn btn-xs btn-danger">
							<i class="fa fa-trash-o" aria-hidden="true"></i>
							Eliminar
						</button>
					{!! Form::close() !!}
	            </div>
				<h3>{{ $auditor->name }}</h3>
				<small>{{ $auditor->role }}</small>
			</div>
		</div>
	</blockquote>
	@endforeach
@endsection