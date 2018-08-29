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