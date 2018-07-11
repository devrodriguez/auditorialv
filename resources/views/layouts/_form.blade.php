
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
		<input type="text" name="nit" class="form-control" value="{{ $enterprise->identification or old('identification') }}">
	</div>
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" class="form-control" value="{{ $enterprise->name or old('name') }}">
	</div>
	<div class="form-group">
		<label for="nit">Direccion</label>
		<input type="text" name="direccion" class="form-control" value="{{ $enterprise->address or old('address') }}">
	</div>
	<div class="form-group">
		<label for="nit">Telefono</label>
		<input type="text" name="telefono" class="form-control" value="{{ $enterprise->phone_number or old('phone_number') }}">
	</div>
	
	<button type="submit" class="btn btn-success btn-cabadelpa-confirm">Guardar</button>
</form>