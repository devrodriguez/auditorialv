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
				<div class="pull-right" role="navigation">
		            <ul class="nav">
		                <li>
		                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
		                        <i class="fa fa-bars"></i>
		                    </a>
		                    <ul class="dropdown-menu dropdown-menu-right">
		                        <!--<li>
		                            <a href="" >
		                            	<i class="fa fa-edit"></i>
		                            	Editar
		                            </a>
		                        </li>-->
		                        <li>
		                            <a href="#" onclick="ValidateDelete({{ $auditor->id }});">
			                            <i class="fa fa-trash-o" aria-hidden="true"></i>
			                            Eliminar
		                            </a>
		                            <form id="formDelete{{ $auditor->id }}" action="{{ route('delete_auditor_path', ['auditor' => $auditor->id]) }}" method="POST">
		                                {{ csrf_field() }}
		                                {{ method_field('DELETE') }}
		                            </form>
		                        </li>
		                    </ul>
		                </li>
		            </ul>
	            </div>
				<h3>{{ $auditor->name }}</h3>
				<small>{{ $auditor->role }}</small>
			</div>
		</div>
	</blockquote>
	@endforeach
@endsection