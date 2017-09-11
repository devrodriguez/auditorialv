
@if($enterprise->exists)
	<form action="{{ route('update_entp_path', ['enterprise' => $enterprise->id]) }}" method="POST">
		<!-- Permite hacer peticiones PUT -->
		{{ method_field('PUT') }}
@else
	<form action="{{ route('store_entp_path') }}" method="POST">
@endif
	
	<!-- Genera un token de autentificacion requerido por laravel -->
	{{ csrf_field() }}
	<div class="form-group">
		<label for="nit">NIT</label>
		<input type="text" name="nit" class="form-control" value="{{ $enterprise->nit or old('nit') }}">
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" class="form-control" value="{{ $enterprise->nombre or old('nombre') }}">
	</div>
	<div class="form-group">
		<label for="nit">Direccion</label>
		<input type="text" name="direccion" class="form-control" value="{{ $enterprise->direccion or old('direccion') }}">
	</div>
	<div class="form-group">
		<label for="descripcion">Descripcion</label>
		<textarea name="descripcion" class="form-control" rows="3">{{ $enterprise->descripcion or old('descripcion') }}</textarea>
	</div>

	<button type="submit" class="btn btn-success btn-cabadelpa-confirm">Guardar</button>
</form>