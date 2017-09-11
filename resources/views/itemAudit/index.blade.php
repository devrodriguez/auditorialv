@extends('layouts/app')

@section('head')
	{!! Html::style('assets/css/pages/itemAudit.css') !!}
@endsection

@section('content')
	<!-- Formulario -->
	<header>
		<form action="{{ route('store_item_path') }}" method="POST">
			<!-- Genera un token de autentificacion requerido por laravel -->
			{{ csrf_field() }}
			<div class="form-group">
					<label for="name">Nombre</label>
					<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="description">Descripcion</label>
				<textarea name="description" class="form-control" rows="2"></textarea>
			</div>
			<button type="submit" class="btn btn-success btn-cabadelpa-confirm">
				<i class="fa fa-save" aria-hidden="true"></i>
				Guardar
			</button>
		</form>
	</header>
	<hr>
	@foreach($itemAudits as $itemAudit)
	<blockquote>
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
                            <a href="#" onclick="ValidateDelete({{ $itemAudit->id }});">
	                            <i class="fa fa-trash-o" aria-hidden="true"></i>
	                            Eliminar
                            </a>
                            <form id="formDelete{{ $itemAudit->id }}" action="{{ route('delete_item_path', ['itemAudit' => $itemAudit->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
		<p>{{ $itemAudit->name }}</p>
		<small>{{ $itemAudit->description }}</footer>				
	</blockquote>
	@endforeach
@endsection

@section('scripts')
	{!! Html::script('assets/js/pages/itemAudit.js') !!}
@endsection